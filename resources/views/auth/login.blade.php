@extends('layouts.inicio.main')
@section('titulo')
    Login
@endsection
@section('conteudo')
    <section id="top_formulario" name='top_formulario' class="col-12 col-sm-9 col-md-4">
        <form id="forms" method="POST" action="{{ route('user.login') }}">
            @csrf
            <img id="foto" class="mb-4" src="https://img.icons8.com/dotty/80/000000/name.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i>
                    <span>
                        <strong>{{ Session::get('success') }}</strong>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i>
                    <span>
                        <strong>{{ Session::get('fail') }}</strong>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="form-group">
                <label for="l_email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required
                    autocomplete="email" autofocus>
                @error('email')
                <div class="invalid-feedback">
                    <span><strong>{{ $message }}</strong></span>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="l_senha">Senha</label>
                <input id="password" type="password" class="form-control" name="password" required
                    autocomplete="current-password">
                @error('password')
                <div class="invalid-feedback">
                    <span><strong>{{ $message }}</strong></span>
                </div>
                @enderror
            </div>
            <div id="check" class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="input_Check">
                <label class="form-check-label" for="l_check">Lembrar de mim </label>
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block"> Entrar</button>
            <p class="message"> <a href="{{ route('mailpage') }}">Esqueceu sua senha?</a></p>
            <p class="message">Não tem conta?<a href="cadastro"> Crie agora</a></p>
            </div>
            </div>
        </form>
    </section>
    
@endsection
