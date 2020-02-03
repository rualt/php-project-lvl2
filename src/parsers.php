<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function getDecodedData($filePath)
{
    $format = pathinfo($filePath)['extension'];

    $mapping = [
        'yaml' => function ($filePath) {
            return Yaml::parseFile($filePath);
        },
        'json' => function ($filePath) {
            return json_decode(file_get_contents($filePath), true);
        }
    ];

    return $mapping[$format]($filePath);
}