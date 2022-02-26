<?php

namespace App\Services\EmployeeManagement;

trait Employee
{
    public $emp;
    
    public function applyJob(): bool
    {
        return true;
    }
    
    public function salary(): int
    {
        return 200;
    }
}