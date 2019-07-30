<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    protected $table = 'corte';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'nombre',
		'estado'
	];

	protected $guarded = [

	];
}
