<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MrecargoModel extends Model
{
    protected $table = 'anunmrecargo'; //! clase 24
    protected $primaryKey = 'aniotasa'; //! Clase  24

    protected $fillable = [
        'aniotasa',
        'mesinicio',
        'tasamensual',
        'topetasa',
    ];
}
