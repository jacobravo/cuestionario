<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaUsuario extends Model
{
	protected $table = 'respuestas_usuario';
    protected $primaryKey = 'id_respuesta';
    public $timestamps = false;

    protected $casts = [
        'id_respuesta' => 'int',
        'id_usuario_respuesta' => 'int',
        'id_respuesta' => 'int'
	];

	protected $fillable = [
        'respuesta_dada'
    ];

    protected $dates = [
        'fecha_respuesta'
    ];
}
