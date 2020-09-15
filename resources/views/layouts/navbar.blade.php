<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars" aria-hidden="true"></i></i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->