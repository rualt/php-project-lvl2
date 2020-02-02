<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;

class GenDifferTest extends TestCase
{
    public function testGenDiffer()
    {
        $file1 = __DIR__ . '/fixtures/data/before.json';
        $file2 = __DIR__ . '/fixtures/data/after.json';
        require(__DIR__ . '/fixtures/expected.php');
        $actual = \Differ\genDiffer($file1, $file2);
        $this->assertEquals($expected, $actual);
    }
}
