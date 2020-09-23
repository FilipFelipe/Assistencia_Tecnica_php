@extends('layouts.app')
@section('titulo')
    Listar Ordem de Serviço
@endsection
@section('content')
<div class="cotainer">
    
    <div class="container">
       
    </div>
    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <form class="form form-inline" method="POST" action="{{url('/ordem_servico/search')}}">
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
                                <th>Id</th>
                                <th>Usuario Numero</th>
                                <th>Funcionario Numero</th>
                                <th>obs</th>
                                <th>data</th>
                                <th>status</th>
                                <th>ordem</th>
                                <th>Controle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($OrdemServicos as $ordem_servicos)
                            <tr>
                                <td data-title="Id">{{$ordem_servicos->id}}</td>
                                <td data-title="usuario">{{ $ordem_servicos->usuario->name }}</td>
                                <td data-title="funcionario">{{ $ordem_servicos->funcionario->name }}</td>
                                <td data-title="Id">{{$ordem_servicos->obs}}</td>
                                <td data-title="Id">{{$ordem_servicos->data}}</td>
                                <td data-title="Id">{{$ordem_servicos->status}}</td>
                                <td data-title="Id">{{$ordem_servicos->ordem_servico}}</td>
                                <td data-title="Ação">
                                    <a class="btn btn-info btn-sm" href="/ordem_servico/alterar/{{ $ordem_servicos->id }}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm" href="/ordem_servico/excluir/{{ $ordem_servicos->id }}"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-info btn-sm" href="/ordem_servico/{{ $ordem_servicos->id }}"><i class="fa fa-address-book"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(@isset($filters))
                    {{$OrdemServicos->appends($filters)->links()}}
                    @else
                    {{$OrdemServicos->links() }}
                    @endisset
                    <a class="btn btn-success btn-sm" href="{{'ordem_servico/novo'}}">Incluir
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection