@extends('layouts.app')
@section('titulo')
    Consultar Funcionário
@endsection
@section('content-header')
<div class="col-6">
    <h1>Consultar Funcionário</h1>
</div>
@endsection
@section('content')
<form>
    @csrf
    @include('funcionario.__form')
    <input type="hidden" value="{{ $funcionario->id }}">
    <div class="row mt-2">
        <div class="col-12">
            <div class="float-right">
                <a href="{{ route('listar_funcionario') }}" class="btn btn-warning"><i class="fa fa-arrow-left mr-1"></i>Voltar</a>
            </div>
        </div>
    </div>
</form>
@endsection