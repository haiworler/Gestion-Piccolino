<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_grupo',
        'id_persona',
        'id_dia',
        'id_hora_inicio',
        'id_hora_fin',
        'estado',
        'fecha_registro',
        'id_materia_grupo',
        'id_usuario_registra'
    ];
}
