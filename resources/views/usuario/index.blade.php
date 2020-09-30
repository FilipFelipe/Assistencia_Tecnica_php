@extends('layouts.app')
@section('titulo')
    Lista de Usuários
@endsection
@section('content')
    <div class="cotainer">

        <div class="container">

        </div>
        <div class="container">
            <div class="tile">
                <div class="tile-body">

                    <form class="form form-inline" method="POST" action="{{ url('/usuario/search') }}">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-1">Nome:</label> <input type="text"
                                    class="form-control col-sm-9" id="nome" name="nome"
                                    placeholder="Digite um nome para pesquisar" value="{{ $filters['nome'] ?? '' }}" />
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">
                                        Pesquisar <i class="fa fa-search-plus"></i>
                                    </button>
                                </div>
                        </div>
                </div>
                </form>
            </div>

        </div>


    </div>
    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <div id="no-more-tables">
                    <table class="table table-stripped table-bordered table-hover cf">
                        <thead class="cf">
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Controle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuario as $usuarios)
                                <tr>
                                    <td>
                                        <a href="usuario/{{ $usuarios->id }}">
                                            @if (isset($usuarios->profile_pic))
                                                <img id="foto_index" class="avatar avatar-user border bg-white"
                                                    src="{{ url('/storage/img', $usuarios->profile_pic) }}" />

                                            @else
                                                @if ($usuarios->sexo == 'Masculino')
                                                    <img id="foto_index" class="avatar avatar-user border bg-white"
                                                        src="{{ url('/storage/img', 'boy.jpg') }}" />
                                                @elseif ($usuarios->sexo == 'Outro')
                                                    <img id="foto_index"
                                                        class="avatar avatar-user width-full border bg-white"
                                                        src="{{ url('/storage/img', 'neutro.jpg') }}" />
                                                @elseif ($usuarios->sexo == 'Feminino')
                                                    <img id="foto_index"
                                                        class="avatar avatar-user width-full border bg-white"
                                                        src="{{ url('/storage/img', 'girl.jpg') }}" />
                                                @else
                                                    <img id="foto_index"
                                                        class="avatar avatar-user width-full border bg-white"
                                                        src="{{ url('/storage/img', 'erro.jpg') }}" />
                                                @endif
                                            @endif
                                        </a>
                                    </td>
                                    <td>{{ $usuarios->name }}</td>
                                    <td>{{ $usuarios->email }}</td>
                                    <td>{{ $usuarios->cpf }}</td>
                                    <td>{{ $usuarios->telefone }}</td>
                                    <td>{{ $usuarios->cep }}</td>
                                    <td>{{ $usuarios->cidade }}</td>
                                    <td>
                                        <a class="btn btn-dark" href="usuario/{{ $usuarios->id }}"><i
                                                class="fa fa-address-card-o"></i></a>
                                        <a class="btn btn-warning" href="usuario/alterar/{{ $usuarios->id }}"><i
                                                class="fa fa-pencil" style="color: #FFF"></i></a>
                                        <a class="btn btn-danger" href="usuario/excluir/{{ $usuarios->id }}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (@isset($filters))
                        {{ $usuario->appends($filters)->links() }}
                    @else
                        {{ $usuario->links() }}
                    @endisset
                    <a class="btn btn-success btn-sm" href="{{ 'usuario/novo' }}">Incluir
                        <i class="fa fa-plus-circle"></i>
            
                    </a>

            </div>
        </div>
    </div>
</div>

</div>

@if (Session::has('success'))
    <div class="alert" id="alert-board" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1500"
        style="position: absolute; top: 3.5rem; right: 0rem;border-right-width: 0px;padding-right: 0px;padding-top: 15px;">
        <div class="alert alert-success alert-dismissible fade show" id="alert-board" role="alert" style="padding-right: 30px;">
            <i class="fa fa-check-circle"></i>
            <span>
                <strong>{{ Session::get('success') }}</strong>
            </span>
        </div>
    </div>
@endif
@if (Session::has('fail'))
    <div class="alert" id="alert-board" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1500"
        style="position: absolute; top: 3.5rem; right: 0rem;border-right-width: 0px;padding-right: 0px;padding-top: 15px;">
        <div class="alert alert-danger alert-dismissible fade show" id="alert-board" role="alert" style="padding-right: 30px;">
            <i class="fa fa-check-circle"></i>
            <span>
                <strong>{{ Session::get('fail') }}</strong>
            </span>
        </div>
    </div>
@endif

@include('layouts.graficos')

@endsection
