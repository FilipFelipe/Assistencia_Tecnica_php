@extends('layouts.app')
@section('title')
Listar
@endsection
@section('content-header')
<div class="col-6">
    <h1>Lista de Funcionario</h1>
</div>
<div class="col-6">
    <a href="{{ route('novo_funcionario') }}" class="btn btn-success float-sm-right"><i class="fa fa-plus mr-2"></i>Novo Funcionario</a>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-hover text-nowrap">
            <thead>
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
                        <a class="btn btn-warning" href="funcionario/alterar/{{ $funcionario->id }}"><i class="fa fa-pencil" ></i></a>
                        <a class="btn btn-danger" href="funcionario/excluir/{{ $funcionario->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="float-right">
            {{ $funcionarios->links() }}
        </div>
    </div>
</div>
@endsection