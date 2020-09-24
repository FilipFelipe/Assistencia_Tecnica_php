<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-link">
        <i class="fa fa-wrench" class="brand-image elevation-3" aria-hidden="true" style="padding-left: 20px"></i>
        <span class="brand-text font-weight-light">FF Assistência</span>
    </div>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (isset($user_auth->profile_pic))
                    <img class="img-circle elevation-2" alt="User Image"
                        src="{{ url('/storage/img', $user_auth->profile_pic) }}" />
                @else
                    @if ($user_auth->sexo == 'Masculino')
                        <img class="img-circle elevation-2" alt="User Image"
                            src="{{ url('/storage/img', 'boy.jpg') }}" />
                    @elseif ($user_auth->sexo == 'Outro')
                        <img class="img-circle elevation-2" alt="User Image"
                            src="{{ url('/storage/img', 'neutro.jpg') }}" />
                    @elseif ($user_auth->sexo == 'Feminino')
                        <img class="img-circle elevation-2" alt="User Image"
                            src="{{ url('/storage/img', 'girl.jpg') }}" />
                    @else
                        <img class="img-circle elevation-2" alt="User Image"
                            src="{{ url('/storage/img', 'erro.jpg') }}" />
                    @endif
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $user_auth->name ?? '' }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('listar_usuario') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('listar_funcionario') }}" class="nav-link">
                        <i class="nav-icon fa fa-id-card-o"></i>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Funcionários</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('listar_ordem') }}" class="nav-link">
                        <i class="nav-icon fa fa-database"></i>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Ordem de Serviços</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
