<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'id_tipo_persona',
		'nombre',
		'apellido',
		'id_tipo_documento',
		'numero_documento',
		'fecha_nacimiento',
		'id_ciudad_de_nacimiento',
		'id_genero',
        'telefono',
        'celular',
        'correo',
        'url_imagen',
        'direccion_residencia',
        'id_barrio',
        'id_sede',
        'id_ocupacion',
        'rh',
        'eps',
        'observaciones',
        'estrato',
        'nivel_sisben',
        'estado',
        'como_llego_a_piccolino',
        'fecha_registro',
        'id_usuario_registra'

	];

	protected $guarded = [

	];
}
