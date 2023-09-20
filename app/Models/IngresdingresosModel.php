<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresdingresosModel extends Model
{
    protected $connection = 'simgpe';
    protected $table = 'ingresdingresos'; //! clase 24
    protected $primaryKey = 'recibo';

    protected $fillable = [

        'fecha',
        'recibo',
        'nombre',
        'concepto_1',
        'concepto_2',
        'concepto_3',
        'concepto_4',
        'con',
        'estatusmov',

    ];

}
