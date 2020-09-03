@extends('layouts.app')

@section('title')
Listar
@endsection

@section('content-header')
<div class="col-6">
    <h1>Lista de Usuário</h1>
</div>
<div class="col-6">
    <a href="{{ route('novo_usuario') }}" class="btn btn-success float-sm-right"><i class="fa fa-plus mr-2"></i>Novo Usuário</a>
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
                @foreach ($usuario as $usuarios)
                <tr>
                    <td>{{ $usuarios->name }}</td>
                    <td>{{ $usuarios->email }}</td>
                    <td>{{ $usuarios->cpf }}</td>
                    <td>{{ $usuarios->telefone }}</td>
                    <td>{{ $usuarios->cep }}</td>
                    <td>{{ $usuarios->cidade }}</td>
                    <td>
                        <a class="btn btn-dark" href="usuario/{{ $usuarios->id }}"><i class="fa fa-address-card-o"></i></a>
                        <a class="btn btn-warning" href="usuario/alterar/{{ $usuarios->id }}"><i class="fa fa-pencil" style="color: #FFF"></i></a>
                        <a class="btn btn-danger" href="usuario/excluir/{{ $usuarios->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $usuario->links() }}
        </div>
    </div>
</div>
@endsection