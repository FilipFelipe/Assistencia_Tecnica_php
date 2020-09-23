  @extends('layouts.app')
  @section('titulo')
  Cadastrar Usuário
@endsection
  @section('content')
  <form method="post" action="{{ route('salvar_usuario') }}">
      @csrf
      @include('usuario.__form')
      <div class="row mt-8">
          <div class="col-10" style="padding-bottom: 20px;">
              <div class="float-right">
                  <button type="submit" class="btn btn-success mr-1">Salvar</button>
                  <a href="{{ route('listar_usuario') }}" class="btn btn-danger">Cancelar</a>
              </div>
          </div>
      </div>
  </form>
  @endsection