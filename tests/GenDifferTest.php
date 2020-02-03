<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;

class GenDifferTest extends TestCase
{
    private $fileOneJson = __DIR__ . '/fixtures/data/before.json';
    private $fileTwoJson = __DIR__ . '/fixtures/data/after.json';
    private $fileOneYaml = __DIR__ . '/fixtures/data/before.yaml';
    
    public function testIfDecoded()
    {
        $this->assertIsArray(\Differ\Parsers\getDecodedData($this->fileOneJson), 'in not an array');
        $this->assertIsArray(\Differ\Parsers\getDecodedData($this->fileOneYaml), 'in not an array');
    }

    public function testGenDiffer()
    {
        require(__DIR__ . '/fixtures/expected.php');
        $actual = \Differ\genDiffer($this->fileOneJson, $this->fileTwoJson);
        $this->assertEquals($expected, $actual);
    }
}
