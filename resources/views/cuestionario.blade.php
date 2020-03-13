@extends('layout')
@section('content')
<script src="{{ asset('js/cuestionario.js') }}"></script>
<script src="{{ asset('js/graph.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/css/sign-in.css') }}">
<div style="text-align: right;">
    <a href="{{route('logout')}}">Cerrar Sesión</a>
</div>
<p class="h4">Bienvenido {{Session::get('usuario')->nombre}}</p>
    @if(isset($preguntas) && $preguntas->count() > 0)
        <p class="h6">Cuestionario</p>
        <table class="table">
            <tr>
                <th style="text-align: left;" scope="col">¿Qué te gustaría que agregáramos al informe?</th>
                <td>
                    <textarea class="form-control" id="pregunta1"></textarea>
                </td>
            </tr>
            <tr>
                <th style="text-align: left;" scope="col">¿La información es correcta?</th>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            &nbsp; <b>Sí</b> &nbsp;
                            <input type="radio" class="pregunta2" name="info" id="2si" value="Sí" aria-label="Sí">
                            &nbsp; <b>No</b> &nbsp;
                            <input type="radio" class="pregunta2" name="info" id="2no" value="No" aria-label="No">
                            &nbsp; <b>Más o menos</b> &nbsp;
                            <input type="radio" class="pregunta2" name="info" id="2masmenos" value="Más o menos" aria-label="Más o menos">
                          </div>
                        </div>
                      </div>
                </td>
            </tr>
            <tr>
                <th style="text-align: left;" scope="col">¿Del 1 al 5, es rápido el sitio?</th>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            &nbsp; <b>1</b> &nbsp;
                            <input type="radio" class="pregunta3" name="rapido" id="1" value="1" aria-label="1">
                            &nbsp; <b>2</b> &nbsp;
                            <input type="radio" class="pregunta3" name="rapido" id="2" value="2" aria-label="2">
                            &nbsp; <b>3</b> &nbsp;
                            <input type="radio" class="pregunta3" name="rapido" id="3" value="3" aria-label="3">
                            &nbsp; <b>4</b> &nbsp;
                            <input type="radio" class="pregunta3" name="rapido" id="4" value="4" aria-label="4">
                            &nbsp; <b>5</b> &nbsp;
                            <input type="radio" class="pregunta3" name="rapido" id="5" value="5" aria-label="5">
                          </div>
                        </div>
                      </div>
                </td>
            </tr>
        </table>
        <br>
        <input type="button" onclick="guardar();" class="btn btn-success" value="Guardar" id="guardar">
        <br>
        <br>
    @endif
    @if($respuestas->count() > 0)
        <p class="h6">Historial de respuestas</p>   
        <table class="table">
            @php
                $i = 0;
            @endphp
            @foreach($respuestas as $respuesta)
                @php
                    $i++;
                @endphp
                <tr>
                    <th style="text-align: left;" scope="col">Pregunta {{$i}} del {{$respuesta->fecha_respuesta->format('d-m-Y')}}</th>
                    <td>
                        {{$respuesta->respuesta_dada}}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    @if(Session::get('usuario')->tipoUsuario->nombre == 'administrador')
        <input type="hidden" id="estSi" value="{{$estadisticas['Si']}}">
        <input type="hidden" id="estNo" value="{{$estadisticas['No']}}">
        <input type="hidden" id="estMoM" value="{{$estadisticas['MoM']}}">
        <p class="h6">Estadísticas</p>

        <div class="text-center" style="display: inline;" id="grafico"></div>

    @endif
@stop
