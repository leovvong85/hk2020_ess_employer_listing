<?php


namespace leo\EmploymentSupportScheme;


class CompanyData implements \JsonSerializable
{

    public $month;

    public $name;

    public $name_in_chinese;

    public $subsidy_amount;

    public $headcount;


    public static function createFromCsvArray($data)
    {

        $company = new CompanyData();
        $company->name = $data[0];
        $company->name_in_chinese = $data[1];
        $company->subsidy_amount = floatval(str_replace(',', '', $data[2]));
        $company->headcount = intval(str_replace(',', '', $data[3]));

        return $company;

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'm' => $this->month,
            'id' => $this->name,
            'n2' => $this->name_in_chinese,
            'a' => $this->subsidy_amount,
            'h' => $this->headcount
        ];
    }
}