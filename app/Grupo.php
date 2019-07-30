<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'id_sede',
        'id_semestre',
        'id_persona_responsable',
        'id_estado',
        'fecha_registro',
        'id_usuario_registro',
    ];
}
