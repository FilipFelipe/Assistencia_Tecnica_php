<div class="container">
    <div class="container px-1 px-md-1 px-lg-1">
        <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">
            <div class="flex-shrink-0 col-1 col-md-3 mb-2 mb-md-5">
                <div class="clearfix d-flex flex-items-center ">
                    <div class="mt-2">
                        <div class="position d-inline-block col-12 col-md-12 mr-3 mr-md-0 flex-shrink-0"
                            style="z-index:4;">
                            
                                @if(isset($usuario->profile_pic))
                                    <img id="imagem_perfil" class="mx-auto d-block" style="height:auto;" width="260"
                                    height="260" class="avatar avatar-user width-full border bg-white"
                                    src="{{ url('/storage/img', $user_auth->profile_pic) }}" />
                                    
                                @else
                                    @if(isset($usuario->sexo))
                                        @if ($usuario->sexo == 'Masculino')
                                            <img id="imagem_perfil" style="height:auto;"  width="260"
                                            height="260" class="avatar avatar-user width-full border bg-white"
                                            src="{{ url('/storage/img', 'boy.jpg') }}" />
                                        @elseif ($usuario->sexo == 'Outro')
                                            <img  id="imagem_perfil" style="height:auto;"  width="260"
                                            height="260" class="avatar avatar-user width-full border bg-white"
                                            src="{{ url('/storage/img', 'neutro.jpg') }}" />
                                        @elseif ($usuario->sexo == 'Feminino')
                                            <img id="imagem_perfil" style="height:auto;"  width="260"
                                            height="260" class="avatar avatar-user width-full border bg-white"
                                            src="{{ url('/storage/img', 'girl.jpg') }}" />
                                        @else
                                            <img id="imagem_perfil" style="height:auto;"  width="260"
                                            height="260" class="avatar avatar-user width-full border bg-white"
                                            src="{{ url('/storage/img', 'erro.jpg') }}" />
                                        @endif
                                    @else
                                        <img id="imagem_perfil" style="height:auto;"  width="260"
                                        height="260" class="avatar avatar-user width-full border bg-white"
                                        src="{{ url( $usuario->profile_pic) }}" />
                                    @endif
                           
                                @endif

                                <div class="mt-1 flex-items-center" style="padding-left: 50px;">
                                    <label class="btn btn-primary" id="input_foto" for="profile_pic"><i class="fa fa-cloud-upload" aria-hidden="true"></i></label>
                                    <input name="profile_pic" onchange="uploadFoto(event)" id="profile_pic" hidden='true' type="file"  accept=".jpg, .jpeg, .png"  class="input_foto_perfil">
                                    <label  onclick="restaurarfoto()" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></label>
                                </div>
                               
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <div class="container"
                    style="padding-left: 0px;padding-right: 0px;border-right-style: solid;border-right-width: 0px;">
                    <div class="mt-2">
                        <div class="js-pinned-items-reorder-container">
                            <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-1 js-pinned-items-reorder-list"
                                style="padding-left: 0px;">
                                <div class="form-group container">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="l_Email">Nome do Usuário</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->name ?? '' }}"
                                                required autocomplete="name" autofocus />

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="l_Email">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->email ?? '' }}"
                                                required autocomplete="email" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="input_senha">Senha</label>
                                            <input id="password" @if($senha ?? '' )readonly @else required
                                                placeholder="Senha - min 8" @endif type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" autocomplete="new-password" />

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="input_confirmacao">Senha</label>
                                            <input id="password-confirm" @if($senha ?? '' ) readonly @else required
                                                placeholder="Confirmar Senha" @endif type="password"
                                                class="form-control" name="password_confirmation"
                                                autocomplete="new-password" />
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="l_cpf">CPF</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->cpf ?? '' }}"
                                                type="text" id="cpf" name="cpf"
                                                onkeypress="$(this).mask('000.000.000-00');" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="l_sexos">Sexo</label>
                                            <select name="sexo" class="form-control">
                                                <option selected @if($readonly ?? '' ) readonly @endif
                                                    value="{{ $usuario->sexo ?? '' }}"> 
                                                    {{ $usuario->sexo ?? '' }}</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                                <option value="Outro">Outro</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="l_data">Data de Nascimento</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->aniversario ?? '' }}"
                                                type="text" required onkeypress="$(this).mask('00/00/0000');"
                                                name="aniversario" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="l_telefone">Telefone</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->telefone ?? '' }}"
                                                type="text" onkeypress="$(this).mask('(00)00000-0000');" required
                                                id="telefone" name="telefone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="l_cep">Cep</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->cep ?? '' }}"
                                                class="form-control" name="cep" required id="cep"
                                                placeholder="Buscar CEP" type="text" value=""
                                                onkeypress="$(this).mask('00000-000');" size="10" maxlength="9"
                                                onblur="pesquisacep(this.value)">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="l_cidade">Rua</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->cidade ?? '' }}"
                                                name="rua" id="rua" required type="text" class="form-control">
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="l_numero">Número</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->numero ?? '' }}"
                                                type="text" name="numero" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="l_complemento">Complemento</label>
                                            <select name="complemento" class="form-control">
                                                <option selected value="Casa">Casa</option>
                                                <option value="Apartamento">Apartamento</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="l_bairro">Bairro</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->bairro ?? '' }}"
                                                name="bairro" id="bairro" required type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="l_cidade">Cidade</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->cidade ?? '' }}"
                                                name="cidade" id="cidade" required type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="l_estado">Estado</label>
                                            <input @if($readonly ?? '' ) readonly @endif
                                                value="{{ $usuario->uf ?? '' }}" name="uf"
                                                id="uf" type="text" required size="2" class="form-control">
                                        </div>

                                    </div>

                                </div>


                            </ol>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@section('javascript')

    <script>
        let foto_inicial = document.getElementById('imagem_perfil').src;
        restaurarfoto = function() {
            document.getElementById('profile_pic').value = "";
            document.getElementById('imagem_perfil').src = foto_inicial;
        }
        var uploadFoto = function(event) {
            var foto = document.getElementById('imagem_perfil');
            foto.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endsection