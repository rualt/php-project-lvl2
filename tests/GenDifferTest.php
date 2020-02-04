<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;

class GenDifferTest extends TestCase
{
    private $fileJson1 = __DIR__ . '/fixtures/data/before.json';
    private $fileJson2 = __DIR__ . '/fixtures/data/after.json';
    private $fileYaml1 = __DIR__ . '/fixtures/data/before.yaml';
    private $fileYaml2 = __DIR__ . '/fixtures/data/before.yaml';

    
    public function testIfDecoded()
    {
        $this->assertIsArray(\Differ\Parsers\getDecodedData($this->fileJson1), 'in not an array');
        $this->assertIsArray(\Differ\Parsers\getDecodedData($this->fileYaml1), 'in not an array');
    }

    public function testGenDiffer()
    {
        require(__DIR__ . '/fixtures/expected.php');
        
        $actual = \Differ\genDiffer($this->fileJson1, $this->fileJson2);
        $this->assertEquals($expected, $actual);

        $actual = \Differ\genDiffer($this->fileYaml1, $this->fileYaml2);
        $this->assertEquals($expected, $actual);

        $actual = \Differ\genDiffer($this->fileJson1, $this->fileYaml2);
        $this->assertEquals($expected, $actual);
    }
}
