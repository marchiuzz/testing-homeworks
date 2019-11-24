<?php


namespace App\Services;


class NumberFormatter implements NumberFormatterInterface
{
    private $number = 0;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    public function NumberFormatter(): string
    {
        $number = $this->number;

        switch ($number){
            case ($number >= 0 && $number < 999.9999) || ($number < 0 && $number > -999.9999):
                return $this->roundToLessThanThousand();
            case (($number >= 999.9999 && $number < 99950) || ($number <= -999.9999 && $number > -99950)):
                return $this->roundToThousandOrMoreToInt();
            case (($number >= 99950 && $number < 999500) || ($number <= -99950 && $number > -999500)):
                return $this->roundToHundredThousandsOrMore();
            case ($number >= 999500 || $number <= -999500) :
                return $this->roundToMillions();
            default:
                return 0;
        }
    }

    public function roundToMillions(): ?string
    {
        $number = $this->number/1000000;
        $result = number_format($number, 2, ".", "")."M";
        return $result;
    }

    public function roundToHundredThousandsOrMore(): ?string
    {
        $numberr = $this->number/1000;
        $result = number_format($numberr, 0, ".", "")."K";
        return $result;
    }

    public function roundToThousandOrMoreToInt(): ?string
    {
        $numberr = $this->number;
        $result = number_format($numberr, 0, "", " ");
        return $result;
    }

    public function roundToLessThanThousand(): ?string
    {
        $numberr = $this->number;
        $result = number_format($numberr, 2, ".", "") + 0;
        return $result;
    }
}