<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class CorteSemestre extends Model
{
    protected $table = 'corte_semestre';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'id_semestre',
        'id_corte',
        'fecha_registro',
        'id_usuario_registra'
	];

	protected $guarded = [

	];
}
