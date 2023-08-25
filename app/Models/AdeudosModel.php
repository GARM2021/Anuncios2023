<?php




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdeudosModel extends Model
{
    protected $table = 'anundadeudos'; //! clase 24
    protected $primaryKey = 'cuenta'; //! Clase  24


    protected $fillable = [

        'cuenta',
        'dua',
        'subdua',
        'fechaadeuda',
        'fpago',
        'recof',
        'fechadescar',
        'valref',
        'rezago',
        'recargo',
        'sancion',
        'gastos',
        'constancia',
        'bonifvalref',
        'bonifrezago',
        'bonifrecargo',
        'bonifsancion',
        'bonifgastos',
        'bonifconstancia',
        'fcaptura',
        'horacap',
        'capturista',
        'extra1',
        'extra2',
        'marcado',

    ];
}
