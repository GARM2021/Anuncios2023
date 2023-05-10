<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuaModel extends Model
{
    protected $table = 'anunmdua'; //! clase 24
    protected $primaryKey = 'dua'; //! Clase  24

    protected $fillable = [

         'dua',
        'nomdua',
        'domdua',
        'colonia',
        'ciudad',
        'prop',
        'telprop',
        'rep_legal',
        'rfc_dua',
        'seguro',
        'fechaini',
        'fechafin', 
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
