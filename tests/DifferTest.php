<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;

class DifferTest extends TestCase
{
    private $fileJson1 = __DIR__ . '/fixtures/data/before.json';
    private $fileJson2 = __DIR__ . '/fixtures/data/after.json';
    private $fileYaml1 = __DIR__ . '/fixtures/data/before.yaml';
    private $fileYaml2 = __DIR__ . '/fixtures/data/after.yaml';

    
    public function testIfDecoded()
    {
        $this->assertIsArray(\Differ\Parsers\parse($this->fileJson1), 'is not an array');
        $this->assertIsArray(\Differ\Parsers\parse($this->fileYaml1), 'is not an array');
    }

    public function testGenDiff()
    {
        require(__DIR__ . '/fixtures/expected.php');
        
        $actual = \Differ\genDiff($this->fileJson1, $this->fileJson2);
        $this->assertEquals($expected, $actual);

        $actual = \Differ\genDiff($this->fileYaml1, $this->fileYaml2);
        $this->assertEquals($expected, $actual);

        $actual = \Differ\genDiff($this->fileJson1, $this->fileYaml2);
        $this->assertEquals($expected, $actual);
    }
}
