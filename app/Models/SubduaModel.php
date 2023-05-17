<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubduaModel extends Model
{
    protected $table = 'anunmsubdua'; //! clase 24
    protected $primaryKey = 'subdua'; //! Clase  24

    protected $fillable = [

        'subdua',
        'nomsubdua',
        'dua',
        'sububicaion',
        'zona',
        'colonia',
        'subeexp',
        'subtelefono',
        'subdesgiro',
        'subusossuelo',
        'subrfc',
        'propnom',
        'propdir',
        'proptel',
        'fbajax',


    ];

    public function colonia()
    {
        return $this->belongsTo(ColoniaModel::class, 'colonia');
    }

    public function relNomcol()
    {
        return $this->hasOne(ColoniaModel::class, 'colonia');
    }
}
