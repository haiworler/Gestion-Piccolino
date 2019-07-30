<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupacion';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'nombre',
		'Observaciones'
	];

	protected $guarded = [

	];
}
