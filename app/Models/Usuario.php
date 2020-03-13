<?php

namespace App\Models;

use App\Models\TipoUsuario;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $casts = [
		'id_usuario' => 'int',
		'id_tipo_user' => 'int'
	];

	protected $fillable = [
        'nombre',
        'mail',
        'pass'
    ];
    
    public function tipoUsuario(){

        return $this::hasOne(TipoUsuario::class, 'id_tipo_usuario', 'id_tipo_user');
    }
}