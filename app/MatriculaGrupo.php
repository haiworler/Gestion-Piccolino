<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class MatriculaGrupo extends Model
{
    protected $table = 'matricula_grupo';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'id_grupo',
        'id_matricula',
        'fecha_registro',
        'id_estado',
        'id_usuario_registra'
	];
}
