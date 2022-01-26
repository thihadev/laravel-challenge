<?php

namespace App\Services\InternetServiceProvider;

class Ooredoo extends Mpt
{
    protected $operator = 'ooredoo';
    
    protected $month = 0;
    
    protected $monthlyFees = 150;
    
    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function totalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}