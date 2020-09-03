  @extends('layouts.app')
  @section('title')
  Incluir
  @endsection
  @section('content-header')
  <div class="col-6">
      <h1>Novo Usuário</h1>
  </div>
  @endsection
  @section('content')
  <form method="post" action="{{ route('salvar_usuario') }}">
      @csrf
      @include('usuario.__form')
      <div class="row mt-2">
          <div class="col-12">
              <div class="float-right">
                  <button type="submit" class="btn btn-success mr-1">Salvar</button>
                  <a href="{{ route('listar_usuario') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      </div>
  </form>
  @endsection