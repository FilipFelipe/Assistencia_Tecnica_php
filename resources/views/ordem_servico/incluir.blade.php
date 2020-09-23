@extends('layouts.app')
@section('titulo')
    Lista de Ordem de Serviços
@endsection
@section('content')
		<div class="container">
			
			<div class="tile">
				<div class="tile-body">
				<form action="{{url('/ordem_servico/salvar')}}"	method="POST" >
						@csrf
							@include('ordem_servico.__form')
						<input type="hidden"  id="id">
						<div class="tile-footer">
							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection