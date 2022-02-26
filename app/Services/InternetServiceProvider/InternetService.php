<?php

namespace App\Services\InternetServiceProvider;

class InternetService
{   
    protected $month, $monthlyFees;

    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}