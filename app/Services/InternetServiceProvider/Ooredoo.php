<?php

namespace App\Services\InternetServiceProvider;

class Ooredoo extends InternetService
{
    protected $monthlyFees = 200;  

    public function getService()
    {
        return $this->service($this->operator);
    }
}