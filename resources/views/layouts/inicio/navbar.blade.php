<nav class="navbar fixed-top navbar-expand-lg navbar-dark pink scrolling-navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}"><strong>Home</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('page.login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cadastro') }}">Cadastro</a>
            </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-instagram"></i></a>
            </li>
        </ul>
    </div>
</nav>
