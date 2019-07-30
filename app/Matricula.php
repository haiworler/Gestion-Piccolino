<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'id_persona',
        'codigo',
        'costo',
        'estado',
        'id_sede',
        'id_semestre',
        'observaciones',
        'id_grado',
        'fecha_registro',
        'is_usuario_registra'
	];
}
