<?php


namespace App\Services;


class NumberFormatter implements NumberFormatterInterface
{
    private $number = 0;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    static public function NumberFormatter(float $number): string
    {
        if($number == 0){
            return 0;
        }

        $numberFormatter = new self($number);

        switch ($number){
            case ($number >= 999500 || $number <= -999500) :
                return $numberFormatter->roundToMillions();
            case (($number >= 99950 && $number < 999500) || ($number <= -99950 && $number > -999500)):
                return $numberFormatter->roundToHundredThousandsOrMore();
            case (($number >= 999.9999 && $number < 99950) || ($number <= -999.9999 && $number > -99950)):
                return $numberFormatter->roundToThousandOrMoreToInt();
            default:
                return $numberFormatter->roundToLessThanThousand();
        }
    }

    public function roundToMillions(): ?string
    {
        $number = $this->number/1000000;
        $result = number_format($number, 2, ".", "")."M";
        var_dump($result);
        return $result;
    }

    public function roundToHundredThousandsOrMore(): ?string
    {
        $numberr = $this->number/1000;
        $result = number_format($numberr, 0, ".", "")."K";
        var_dump($result);
        return $result;
    }

    public function roundToThousandOrMoreToInt(): ?string
    {
        $numberr = $this->number;
        $result = number_format($numberr, 0, "", " ");
        var_dump($result);
        return $result;
    }

    public function roundToLessThanThousand(): ?string
    {
        $numberr = $this->number;
        $result = number_format($numberr, 2, ".", "") + 0;
        var_dump($result);
        return $result;
    }
}