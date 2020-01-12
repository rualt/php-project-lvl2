<?php

//namespase \Differ;

use function Funct\Collection\flatten;

/* $autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
} */

/* function getDecodedData($file)
{
    return json_decode(file_get_contents($fileFile), true);
} */

/*function genDiffer($fistFile, $secondFile)
{
    $dataFirst = getDecodedData($fistFile);
    $dataSecond = getDecodedData($secondFile);
}

$arr1 = [
    "host" => "hexlet.io",
    "timeout" => 50,
    "proxy" => "123.234.53.22",
    "test" => 123
  ];

  $arr2 = [
    "timeout" => 20,
    "verbose" => true,
    "host" => "hexlet.io",
    ];*/
  
function genDiffer($arr1, $arr2)
{
    $mergedData = array_merge_recursive($arr1, $arr2);
    $mappedData = array_map(function ($key, $value) use ($arr1) {
        if (is_array($value)) {
            return ($value[0] === $value[1]) ?
            ["    $key: $value[0]"] : ["  - $key: $value[0]", "  + $key: $value[1]"];
        }
          return array_key_exists($key, $arr1) ? ["  - $key: $value"] : ["  + $key: $value"];
    }, array_keys($mergedData), $mergedData);

    $data = (implode("\n", flatten($mappedData)));
    return "{\n" . $data . "\n}\n";
}

 // print_r(genDiffer($arr1, $arr2));
