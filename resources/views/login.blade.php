
@extends('layout')
@section('content')
<script src="{{ asset('js/login.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/css/sign-in.css') }}">
    <div class="form-signin">
        <div class="form-group">
            <label for="correo">Su email</label>
            <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <input type="button" value="Ingresar" id="ingresar" class="btn btn-primary">
        <br>
    </div>
@stop
