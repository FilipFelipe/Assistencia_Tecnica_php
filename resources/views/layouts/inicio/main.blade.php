<!doctype html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('lib/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/index/landing-page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>@yield('titulo') - Assistencia Técnica</title>
    @include('layouts.inicio.navbar')
</head>
<body>
    <section class="container-fluid">
    <center>@yield('conteudo')</center>
    </section>
    <p id="ano" class="mt-5 mb-3 text-muted">© 2017-2020</p>
</body>
<script type="text/javascript">function limpa_formulário_cep(){document.getElementById('rua').value=("");document.getElementById('bairro').value=("");document.getElementById('cidade').value=("");document.getElementById('uf').value=("")}function meu_callback(conteudo){if(!("erro"in conteudo)){document.getElementById('rua').value=(conteudo.logradouro);document.getElementById('bairro').value=(conteudo.bairro);document.getElementById('cidade').value=(conteudo.localidade);document.getElementById('uf').value=(conteudo.uf)}else{limpa_formulário_cep();alert("CEP não encontrado, Favor preencher manualmente!")}}function pesquisacep(valor){var cep=valor.replace(/\D/g,'');if(cep!=""){var validacep=/^[0-9]{8}$/;if(validacep.test(cep)){document.getElementById('rua').value="...";document.getElementById('bairro').value="...";document.getElementById('cidade').value="...";document.getElementById('uf').value="...";var script=document.createElement('script');script.src='https://viacep.com.br/ws/'+cep+'/json/?callback=meu_callback';document.body.appendChild(script)}else{limpa_formulário_cep();alert("Formato de CEP inválido.")}}else{limpa_formulário_cep()}};</script>
<script src="{{ asset('js/jquery/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>

</html>
