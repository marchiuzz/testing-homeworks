<?php

namespace App\Tests;

use App\Services\MoneyFormatter;
use App\Services\MoneyFormatterInterface;
use App\Services\NumberFormatter;
use App\Services\NumberFormatterInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class MoneyFormatterTest extends TestCase
{
    public function testMoneyFormatterEur()
    {
        $numberFormatter = new NumberFormatter(211.99);
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals("211.99 €", $moneyFormatter->formatEur());
    }

    public function testMoneyFormatterUsd()
    {
        $numberFormatter = new NumberFormatter(211.99);
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals("$211.99", $moneyFormatter->formatUsd());
    }

    /** @var NumberFormatter|MockObject $number */
    public function testMoneyFormattingEurWithMocks()
    {
        $number = $this->createMock(NumberFormatter::class);
        $number
            ->method('NumberFormatter')
            ->will($this->onConsecutiveCalls(211.99));

        $workLoadCounter = new MoneyFormatter($number);
        $this->assertEquals("211.99 €", $workLoadCounter->formatEur());
    }

    /** @var NumberFormatter|MockObject $number */
    public function testMoneyFormattingUsdWithMocks()
    {
        $number = $this->createMock(NumberFormatter::class);
        $number
            ->method('NumberFormatter')
            ->will($this->onConsecutiveCalls(211.99));

        $workLoadCounter = new MoneyFormatter($number);
        $this->assertEquals("$211.99", $workLoadCounter->formatUsd());
    }
}
