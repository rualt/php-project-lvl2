<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;

class GenDifferTest extends TestCase
{
    private $file1 = __DIR__ . '/fixtures/data/before.json';
    private $file2 = __DIR__ . '/fixtures/data/after.json';
    
    public function testIfDecoded()
    {
        $this->assertIsArray(\Differ\getDecodedData($this->file1), 'in not an array');
        $this->assertIsArray(\Differ\getDecodedData($this->file2), 'in not an array');
    }


    public function testGenDiffer()
    {
        require(__DIR__ . '/fixtures/expected.php');
        $actual = \Differ\genDiffer($this->file1, $this->file2);
        $this->assertEquals($expected, $actual);
    }
}
