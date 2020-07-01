<?php

use leo\EmploymentSupportScheme\ApprovedList;

// Composer autoload
include_once "../vendor/autoload.php";

include_once "../config.php";

//$data_source = '../data-source';
if ($data_source[strlen($data_source)-1] !== DIRECTORY_SEPARATOR)
    $data_source = $data_source.DIRECTORY_SEPARATOR;


if (!file_exists($data_source) || !is_readable($data_source))
    die("Data folder is not exist or cannot be read.");


$files = scandir($data_source);

if (!is_array($files)) {
    die("data folder cannot be read.");
}

$data = [];

foreach ($files as $path) {
    if ($path !== "." && $path !== "..") {

        $file = new ApprovedList($data_source.$path);

        $data = array_merge($data, $file->data);

    }
}

$json_file_path = $data_source . 'data' . (new DateTime)->format('YmdHis') . '.json';
print_r($json_file_path);
exit();
file_put_contents($json_file_path, json_encode($data));





