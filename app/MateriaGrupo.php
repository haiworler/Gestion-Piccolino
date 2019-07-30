<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class MateriaGrupo extends Model
{
    protected $table = 'materia_grupo';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_grupo',
        'id_materia',
        'estado',
        'fecha_asignacion',
        'id_usuario_registra'
    ];
}
