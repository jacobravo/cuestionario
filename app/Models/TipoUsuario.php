<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
	protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo_usuario';
    public $timestamps = false;

    protected $casts = [
		'id_tipo_usuario' => 'int'
	];

	protected $fillable = [
        'nombre'
    ];
}
