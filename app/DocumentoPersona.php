<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class DocumentoPersona extends Model
{
    protected $table = 'documento';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
		'nombre',
		'id_tipo_documento',
		'fecha_obtencion',
		'nombre_entidad',
		'observaciones',
		'id_sede',
		'ubicacion',
        'id_persona',
        'estado',
        'fecha_registro',
        'id_usuario_registra'
	];

	protected $guarded = [

	];
}
