<div class="form-group container">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="l_Email">Nome</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->name ?? '' }}" required autocomplete="name" autofocus />

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="l_Email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->email ?? '' }}" required autocomplete="email" />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="input_senha">Senha</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="input_confirmacao">Senha</label>
            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Senha" name="password_confirmation" required autocomplete="new-password" />
        </div>


        <div class="form-group col-md-4">
            <label for="l_cpf">CPF</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->cpf ?? '' }}" type="text" id="cpf" name="cpf" onkeypress="$(this).mask('000.000.000-00');" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="l_sexos">Sexo</label>
            <select name="sexo" class="form-control">
                <option selected @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->sexo ?? '' }}">{{ $funcionario->sexo ?? '' }}</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>

            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="l_data">Data de Nascimento</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->aniversario ?? '' }}" type="text" required onkeypress="$(this).mask('00/00/0000');" name="aniversario" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="l_telefone">Telefone</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->telefone ?? '' }}" type="text" onkeypress="$(this).mask('(00)00000-0000');" required id="telefone" name="telefone" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="l_cep">Cep</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->cep ?? '' }}" class="form-control" name="cep" required id="cep" placeholder="Buscar CEP" type="text" value="" onkeypress="$(this).mask('00000-000');" size="10" maxlength="9" onblur="pesquisacep(this.value)">
        </div>
        <div class="form-group col-md-5">
            <label for="l_cidade">Rua</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->cidade ?? '' }}" name="rua" id="rua" required type="text" class="form-control">
        </div>

        <div class="form-group col-sm-2">
            <label for="l_numero">Número</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->numero ?? '' }}" type="text" name="numero" required class="form-control">
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
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->bairro ?? '' }}" name="bairro" id="bairro" required type="text" class="form-control">
        </div>
        <div class="form-group col-md-5">
            <label for="l_cidade">Cidade</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->cidade ?? '' }}" name="cidade" id="cidade" required type="text" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="l_estado">Estado</label>
            <input @if($readonly ?? '' ) readonly @endif value="{{ $funcionario->uf ?? '' }}" name="uf" id="uf" type="text" required size="2" class="form-control">
        </div>

    </div>
</div>