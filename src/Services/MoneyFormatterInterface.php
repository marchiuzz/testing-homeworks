<?php


namespace App\Services;


interface MoneyFormatterInterface
{
    public function formatEur(): ?string;

    public function formatUsd(): ?string;
}