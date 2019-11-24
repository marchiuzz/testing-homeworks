<?php


namespace App\Services;


interface NumberFormatterInterface
{
    public function roundToMillions(): ?string;

    public function roundToHundredThousandsOrMore(): ?string;

    public function roundToThousandOrMoreToInt(): ?string;

    public function roundToLessThanThousand(): ?string;
}