<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
	protected $table = 'preguntas';
    protected $primaryKey = 'id_pregunta';
    public $timestamps = false;

    protected $casts = [
        'id_pregunta' => 'int'
	];

	protected $fillable = [
        'enunciado',
        'respuesta_correcta'
    ];
}
