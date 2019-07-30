<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo',
        'estado',
        'observaciones',
        'creditos',
        'fecha_registro',
        'id_usuario_registra',
    ];
}
