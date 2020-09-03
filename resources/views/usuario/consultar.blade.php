@extends('layouts.app')
@section('title')
Consultar
@endsection
@section('content-header')
<div class="col-6">
    <h1>Consultar Usuário</h1>
</div>
@endsection
@section('content')
<form>
    @csrf
    @include('usuario.__form')
    <input type="hidden" value="{{ $usuario->id }}">
    <div class="row mt-2">
        <div class="col-12">
            <div class="float-right">
                <a href="{{ route('listar_usuario') }}" class="btn btn-warning"><i class="fa fa-arrow-left mr-1"></i>Voltar</a>
            </div>
        </div>
    </div>
</form>
@endsection