<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;

class GenDifferTest extends TestCase
{
    public function testGenDiffer()
    {
        require(__DIR__ . '/fixtures/expected.php');
        $file1 = "data/before.json";
        $file2 = "data/after.json";

        $actual = \Differ\genDiffer($file1, $file2);
        $this->assertEquals($expected, $actual);
    }
}
