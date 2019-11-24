<?php

namespace App\Tests;

use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    public function testRoundToMillion()
    {
        $this->assertEquals('-1.00M', NumberFormatter::NumberFormatter(-999500));
    }

    public function testRoundToHundredThousandsOrMore()
    {
        $this->assertEquals('-124K', NumberFormatter::NumberFormatter(-123654.89));
    }

    public function testRoundToThousandOrMoreToInt()
    {
        $this->assertEquals('27 534', NumberFormatter::NumberFormatter(27533.78));
    }

    public function testRoundToLessThanThousand()
    {
        $this->assertEquals('-1 000', NumberFormatter::NumberFormatter(-999.9999));
    }

    public function testZero()
    {
        $this->assertEquals(0,NumberFormatter::NumberFormatter(0));
    }
}
