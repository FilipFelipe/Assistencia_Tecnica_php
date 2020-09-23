@extends('layouts.inicio.main')
@section('titulo')
    Registro
@endsection
@section('conteudo')
    <section class="container-fluid">
        <center>
            <section id="top_formulario" class="col-12 col-sm-9 col-md-5">
                <form id="forms" name="usuario" class="cadastro" method="POST" action="{{ route('cadastro_usuario') }}">
                    @csrf
                    <img id="foto" class="mb-4" src="https://img.icons8.com/office/80/000000/parse-from-clipboard.png"
                        alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Cadastro de usuário</h1>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="l_Email">Nome</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="l_Email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input_senha">Senha</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input_confirmacao">Senha</label>
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Senha"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="l_cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" onkeypress="$(this).mask('000.000.000-00');"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="l_sexos">Sexo</label>
                            <select name="sexo" class="form-control">
                                <option selected value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="l_data">Data de Nascimento</label>
                            <input type="text" required onkeypress="$(this).mask('00/00/0000');" name="aniversario"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="l_telefone">Telefone</label>
                            <input type="text" onkeypress="$(this).mask('(00)00000-0000');" required id="telefone"
                                name="telefone" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="l_cep">Cep</label>
                            <input class="form-control" name="cep" required id="cep" placeholder="Buscar CEP" type="text"
                                value="" onkeypress="$(this).mask('00000-000');" size="10" maxlength="9"
                                onblur="pesquisacep(this.value)">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="l_cidade">Rua</label>
                            <input name="rua" id="rua" required type="text" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="l_numero">Número</label>
                            <input type="text" name="numero" required class="form-control">
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
                            <input name="bairro" id="bairro" required type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="l_cidade">Cidade</label>
                            <input name="cidade" id="cidade" required type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="l_estado">Estado</label>
                            <input name="uf" id="uf" type="text" required size="2" class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Manter conectado
                            </label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
                            </div>
                        </div>
                </form>
                <p class="message">Já é cadastrado?<a href="/login"> Login</a></p>
            </section>
        </center>
    </section>
    <p id="ano" class="mt-5 mb-3 text-muted">© 2017-2020</p>
@endsection
