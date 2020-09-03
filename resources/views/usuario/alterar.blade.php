@extends('layouts.app')
@section('title')
Alterar
@endsection
@section('content-header')
<div class="col-6">
    <h1>Alterar Usuário</h1>
</div>
@endsection
@section('content')
<form method="post" action="/alterar_usuario/{{$usuario->id}}">
    @csrf
    @include('usuario.__form')
    <input type="hidden" value="{{ $usuario->id }}">
    <div class="row mt-2">
        <div class="col-12">
            <div class="float-right">
                <button type="submit" class="btn btn-warning mr-1">Alterar</button>
                <a href="{{ route('listar_usuario') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection