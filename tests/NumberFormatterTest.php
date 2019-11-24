<?php

namespace App\Tests;

use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    public function providerPositiveNumbers(): array
    {
        return [
            'zero' => ["0", 0],
            'millions' => ["1.00M", 999500],
            'thousands' => ["124K", 123654.89],
            'thousand' => ["27 534", 27533.78],
            'lessThanThousand' => ["66.67", 66.6666]
        ];
    }


    /**
     * @dataProvider providerPositiveNumbers
     * @param $expectedResults
     * @param $givenNumber
     */
    public function testPositiveNumbersFormatter($expectedResults, $givenNumber)
    {
        $numberFormatter = new NumberFormatter($givenNumber);
        $this->assertEquals($expectedResults, $numberFormatter->NumberFormatter());
    }

    public function providerNegativeNumbers(): array
    {
        return [
            'zero' => ["0", 0],
            'millions' => ["-1.00M", -999500],
            'thousands' => ["-124K", -123654.89],
            'thousand' => ["-27 534", -27533.78],
            'lessThanThousand' => ["-66.67", -66.6666]
        ];
    }


    /**
     * @dataProvider providerNegativeNumbers
     * @param $expectedResult
     * @param $givenNumber
     */
    public function testNegativeNumbersFormatter($expectedResult, $givenNumber)
    {
        $numberFormatter = new NumberFormatter($givenNumber);
        $this->assertEquals($expectedResult, $numberFormatter->NumberFormatter());
    }


    public function testRoundToMillion()
    {
        $numberFormatter = new NumberFormatter(-999500);
        $this->assertEquals('-1.00M', $numberFormatter->NumberFormatter());
    }

    public function testRoundToHundredThousandsOrMore()
    {
        $numberFormatter = new NumberFormatter(-123654.89);
        $this->assertEquals('-124K', $numberFormatter->NumberFormatter());
    }

    public function testRoundToThousandOrMoreToInt()
    {
        $numberFormatter = new NumberFormatter(27533.78);
        $this->assertEquals('27 534', $numberFormatter->NumberFormatter());
    }

    public function testRoundToLessThanThousand()
    {
        $numberFormatter = new NumberFormatter(-999.9999);
        $this->assertEquals('-1 000', $numberFormatter->NumberFormatter());
    }

    public function testZero()
    {
        $numberFormatter = new NumberFormatter(0);
        $this->assertEquals(0, $numberFormatter->NumberFormatter());
    }
}
