<?php

namespace Piccolino;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';

	protected $primaryKey = 'id';

	public $timestamps = false;

	protected $fillable=[
        'nombre',
        'codigo',
        'estado'
	];

	protected $guarded = [

	];
}
