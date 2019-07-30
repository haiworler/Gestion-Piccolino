<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
		'nombre',
		'estado'
	];

	protected $guarded = [

	];
}
