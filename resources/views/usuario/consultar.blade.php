@extends('layouts.app')
@section('titulo')
    Consular Usuário
@endsection

@section('content')
<form>
    @csrf
    @include('usuario.__form')
    <input type="hidden" value="{{ $usuario->id }}">
    <div class="row mt-2">
        <div class="col-10" style="padding-bottom: 20px;">
            <div class="float-right">
                <a href="{{ route('listar_usuario') }}" class="btn btn-warning"><i class="fa fa-arrow-left mr-1"></i>Voltar</a>
            </div>
        </div>
    </div>
</form>
@endsection