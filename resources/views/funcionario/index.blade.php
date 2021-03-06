@extends('layouts.app')
@section('titulo')
    Listar Funcionários
@endsection
@section('content')
<div class="cotainer">

    <div class="container">

    </div>
    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <form class="form form-inline" method="POST" action="{{url('/usuario/search')}}">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-1">Nome:</label> <input type="text" class="form-control col-sm-9" id="nome" name="nome" placeholder="Digite um nome para pesquisar" value="{{$filters['nome'] ?? ''}}" />
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
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td>{{ $funcionario->name }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>{{ $funcionario->cpf }}</td>
                                <td>{{ $funcionario->telefone }}</td>
                                <td>{{ $funcionario->cep }}</td>
                                <td>{{ $funcionario->cidade }}</td>
                                <td>
                                    <a class="btn btn-dark" href="funcionario/{{ $funcionario->id }}"><i class="fa fa-address-card-o"></i></a>
                                    <a class="btn btn-warning" href="funcionario/alterar/{{ $funcionario->id }}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="funcionario/excluir/{{ $funcionario->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-success btn-sm" href="{{'funcionario/novo'}}">Incluir
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection