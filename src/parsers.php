<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

/*function getDecodedData($filePath, $format)
{
    return json_decode(file_get_contents($filePath), true);
} */

$before = [
    "host" => "hexlet.io",
    "timeout" => 50,
    "proxy"  => "123.234.53.22"
];

$after = [
    "timeout" => 20,
    "verbose" => true,
    "host" => "hexlet.io"
];

$yamlBefore = Yaml::dump($before);
$yamlAfter = Yaml::dump($after);

file_put_contents(__DIR__ . '/../tests/fixtures/before.yaml', $yamlBefore);
file_put_contents(__DIR__ . '/../tests/fixtures/after.yaml', $yamlAfter);
