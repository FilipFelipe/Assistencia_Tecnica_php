@extends('layouts.app')
@section('titulo')
    Alterar Funcionário
@endsection
@section('content-header')
<div class="col-6">
    <h1>Alterar funcionário</h1>
</div>
@endsection
@section('content')
<form method="post" action="/funcionario/alterar/{{$funcionario->id}}">
    @csrf
    @include('funcionario.__form')
    <input type="hidden" value="{{ $funcionario->id }}">
    <div class="row mt-2">
        <div class="col-12">
            <div class="float-right">
                <button type="submit" class="btn btn-warning mr-1">Alterar</button>
                <a href="{{ route('listar_funcionario') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection