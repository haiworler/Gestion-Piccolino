<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class ContactoPersona extends Model
{
    protected $table = 'contacto_persona';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
		'id_persona',
		'nombre',
		'telefono',
		'correo',
		'parentezco',
		'observaciones',
		'fecha_registro',
        'id_usuario_registra'
	];

	protected $guarded = [

	];
}
