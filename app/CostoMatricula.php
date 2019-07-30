<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class CostoMatricula extends Model
{
    protected $table = 'costo_matricula';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'valor',
        'fecha_inicio_periodo',
        'fecha_fin_periodo',
        'observaciones',
        'fecha_registro',
        'id_usuario_registro'
	];
}
