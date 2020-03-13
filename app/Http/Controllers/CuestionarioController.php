<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\RespuestaUsuario;
use App\Http\Middleware\LogControl;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CuestionarioController extends Controller
{
    public function __construct(){

        $this->middleware(LogControl::class);
    }

    public function index(){

        try{
            if(Session::get('usuario')->tipoUsuario->nombre == 'administrador'){

                if(RespuestaUsuario::where('id_respuesta', '=', Session::get('usuario')->id_usuario)
                                    ->whereDate('fecha_respuesta', '!=', Carbon::now()->month)->count() < 1){

                    $preguntas = Pregunta::all();
                    $respuestas = RespuestaUsuario::all();

                }
                else{
                    $preguntas = null;
                    $respuestas = RespuestaUsuario::all();
                }

                $estadisticas = [];

                $estadisticas['Si'] = RespuestaUsuario::where('id_pregunta', '=', 2)->where('respuesta_dada', '=', 'Sí')->count();
                $estadisticas['No'] = RespuestaUsuario::where('id_pregunta', '=', 2)->where('respuesta_dada', '=', 'No')->count();
                $estadisticas['MoM'] = RespuestaUsuario::where('id_pregunta', '=', 2)->where('respuesta_dada', '=', 'Más o menos')->count();

                return view('cuestionario', compact('preguntas', 'respuestas', 'estadisticas'));
            }
            elseif(Session::get('usuario')->tipoUsuario->nombre == 'usuario'){

                if(RespuestaUsuario::where('id_respuesta', '=', Session::get('usuario')->id_usuario)
                                ->whereDate('fecha_respuesta', '!=', Carbon::now()->month)->count() < 1){

                    $preguntas = Pregunta::all();
                    $respuestas = RespuestaUsuario::where('id_usuario_responde', '=', Session::get('usuario')->id_usuario)
                                    ->where('fecha_respuesta', RespuestaUsuario::max('fecha_respuesta'))
                                    ->orderBy('fecha_respuesta')
                                    ->get();

                }
                else{

                    $preguntas = null;
                    $respuestas = RespuestaUsuario::where('id_usuario_responde', '=', Session::get('usuario')->id_usuario)
                                    ->where('fecha_respuesta', RespuestaUsuario::max('fecha_respuesta'))
                                    ->orderBy('fecha_respuesta')
                                    ->get();
                }

                return view('cuestionario', compact('preguntas', 'respuestas'));
            }
            else{

                return "Su perfil no existe";
            }
        }
        catch(Exception $ex){

            return $ex->getMessage();
        }
    }

    public function save(Request $request){

        try{
            $num = Pregunta::all()->count();

            for ($i=0; $i < $num; $i++) { 

                $obj = new RespuestaUsuario();

                $obj->id_usuario_responde = Session::get('usuario')->id_usuario;
                $obj->id_pregunta = Pregunta::all()[$i]->id_pregunta;
                $obj->respuesta_dada = $request->get('respuesta'.$i);
                $obj->fecha_respuesta = Carbon::now();

                $obj->save();
            }

            return "Cuestionario guardado correctamente";
            
        }
        catch(Exception $ex){

            return $ex->getMessage();
        }
    }
}