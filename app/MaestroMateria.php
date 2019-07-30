<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class MaestroMateria extends Model
{
    protected $table = 'maestro_materia';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_materia',
        'id_persona',
        'estado',
        'observaciones',
        'fecha_registro',
        'id_usuario_registra'
    ];
}
