<?php


namespace App\Services;


class MoneyFormatter implements MoneyFormatterInterface
{
    private const EurSymbol = "€";
    private const UsdSymbol = "$";
    private $numberFormatter;

    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur(): ?string
    {
        $formatted = $this->numberFormatter->NumberFormatter() . " " . self::EurSymbol;
        return $formatted;
    }

    public function formatUsd(): ?string
    {
        $formatted = self::UsdSymbol . $this->numberFormatter->NumberFormatter();
        return $formatted;
    }
}