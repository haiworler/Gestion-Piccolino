<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $table = 'semestre';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'fecha_inicio',
		'fecha_fin',
		'observaciones',
		'codigo',
		'estado',
		'fecha_registro',
		'id_usuario_registra'
	];

	protected $guarded = [

	];
}
