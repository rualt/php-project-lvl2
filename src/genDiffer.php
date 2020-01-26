<?php

namespace Differ;

use function Funct\Collection\flatten;

function getDecodedData($filePath)
{
    return json_decode(file_get_contents($filePath), true);
}

function genDiffer($firstFilePath, $secondFilePath)
{
    $firstData = getDecodedData($firstFilePath);
    $secondData = getDecodedData($secondFilePath);
    $mergedData = array_merge_recursive($firstData, $secondData);
    $mappedData = array_map(function ($key, $value) use ($firstData) {
        if (is_array($value)) {
            return ($value[0] === $value[1]) ?
            ["    $key: $value[0]"] : ["  - $key: $value[0]", "  + $key: $value[1]"];
        }
          return array_key_exists($key, $firstData) ? ["  - $key: $value"] : ["  + $key: $value"];
    }, array_keys($mergedData), $mergedData);

    $data = (implode("\n", flatten($mappedData)));
    return("{\n" . $data . "\n}\n");
}
