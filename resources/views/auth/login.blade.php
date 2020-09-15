<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('lib/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/font-awesome/css/font-awesome.css') }}">
  <title>Cadastro de Usuário - FF</title>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark pink scrolling-navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Cadastrar</a>
        </li>
      </ul>
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">

        </li>
        <li class="nav-item">

        </li>
        <li class="nav-item">

        </li>
      </ul>
    </div>
  </nav>

</head>

<body>
  <section class="container-fluid">
    <center>

      <section id="top_formulario" class="col-12 col-sm-9 col-md-4">
        <form method="POST" action="{{ route('user.login') }}">
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
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email" autofocus>
            @error('email')
            <div class="invalid-feedback">
              <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="l_senha">Senha</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
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
          <p class="message"> <a href="#">Esqueceu sua senha?</a></p>
          <p class="message">Não tem conta?<a href="cadastro"> Crie agora</a></p>
          </div>
          </div>
        </form>
      </section>
    </center>
  </section>
  <p id="ano" class="mt-5 mb-3 text-muted">© 2017-2020</p>
</body>
<script src="{{ asset('lib/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('lib/js/popper.min.js') }}"></script>
<script src="{{ asset('lib/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/js/main.js') }}"></script>
<script src="{{ asset('lib/js/plugins/pace.min.js') }}"></script>

</html>