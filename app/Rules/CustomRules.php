<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InValues implements Rule
{
    protected $allowedValues;

    public function __construct($allowedValues)
    {
        $this->allowedValues = $allowedValues;
    }

    public function passes($attribute, $value)
    {
        return in_array($value, $this->allowedValues);
    }

    public function message()
    {
        return 'El campo :attribute debe ser uno de los valores permitidos.';
    }
}