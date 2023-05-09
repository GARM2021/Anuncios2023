<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColoniaModel extends Model
{
    protected $table = 'anunmcolonia'; //! clase 24
    protected $primaryKey = 'colonia'; //! Clase  24

    protected $fillable = [ 
         'colonia',
        'nomcol',

    ];
}
