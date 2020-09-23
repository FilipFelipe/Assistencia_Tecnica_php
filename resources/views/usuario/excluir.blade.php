@extends('layouts.app')
@section('titulo')
Excluir Usuário
@endsection

@section('content')
<form method="post" action="/excluir/{{$usuario->id}}">
    @csrf
    @include('usuario.__form')
    <input type="hidden" value="{{ $usuario->id }}">
    <div class="row mt-2">
        <div class="col-10" style="padding-bottom: 20px;">
            <div class="float-right">
                <button type="submit" class="btn btn-warning mr-1">Excluir</button>
                <a href="{{ route('listar_usuario') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection