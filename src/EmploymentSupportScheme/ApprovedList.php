<?php

namespace leo\EmploymentSupportScheme;

use http\QueryString;
use Smalot\PdfParser\Parser;

class ApprovedList
{

    private $path;

    public $data = [];

    public function __construct($path)
    {

        if (!file_exists($path) && !is_readable($path)) {
            throw new \Exception(sprintf('File %s connot be read.', $path));
        }

        $this->path = $path;


        $pattern = '/Wage\s*?subsidy\s*?amount\s*?\(\s*?(\w*)\s*?‐\s*?(\w*)\s(\d{4})/i';
        $matched = false;

        $month_string = "";

        $handle = fopen($path, "r");
        while (($data = fgetcsv($handle)) !== FALSE) {

            if (!$matched) {
                foreach ($data as $string) {
                    if (preg_match($pattern, $string, $match) === 1) {
                        $month1 = $match[1];
                        $month2 = $match[2];
                        $year   = $match[3];
                        $matched = true;
                        $month_string = sprintf("%s%s-%s%s",
                            $year,
                            $this->monthStringToNumber($month1),
                            $year,
                            $this->monthStringToNumber($month2));
                    }
                }
            }

            if (is_array($data) &&
                count($data) >= 4 &&
                is_numeric($data[3])
            ) {
                $this->data[] = CompanyData::createFromCsvArray($data);
            }
        }

        foreach ($this->data as $data) {
            if ($data instanceof CompanyData) {
                $data->month = $month_string;
            }
        }



    }

    public function getListInJsonFormat()
    {
        return json_encode($this->data);
    }

    private function monthStringToNumber(string $month): string
    {
        $result = "";

        switch ($month) {
            case "Jan":
            case "January":
                $result = "01";
                break;

            case "Feb":
            case "February":
                $result = "02";
                break;

            case "Mar":
            case "March":
                $result = "03";
                break;

            case "Apr":
            case "April":
                $result = "04";
                break;

            case "May":
//            case "May":
                $result = "05";
                break;

            case "Jun":
            case "June":
                $result = "06";
                break;

            case "Jul":
            case "July":
                $result = "07";
                break;

            case "Aug":
            case "August":
                $result = "08";
                break;

            case "Sep":
            case "September":
                $result = "09";
                break;

            case "Oct":
            case "October":
                $result = "10";
                break;

            case "Nov":
            case "November":
                $result = "11";
                break;

            case "Dec":
            case "December":
                $result = "12";
                break;

        }

        return $result;
    }


}