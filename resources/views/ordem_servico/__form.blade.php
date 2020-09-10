<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="ordem_servico" class="control-label">Numero da Ordem de Servico:</label>
            <input type="text" name="ordem_servico" id="ordem_servico" value="{{ isset( $OrdemServicos->ordem_servico) ? $OrdemServicos->ordem_servico: '' }}" class="form-control @error('Ordem_servico') is-invalid @enderror" />
            @error('')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="usuario" class="control-label">Usuário:</label>
            <select type="text" name="usuario" id="usuario" class="form-control @error('usuario') is-invalid @enderror">
                @if(isset( $OrdemServicos->usuario_id))

                @foreach ($usuarios as $usuario)
                <option value="{{$usuario->id}}" {{$usuario->id == $OrdemServicos->usuario_id   ? 'selected' : ''}}>{{$usuario->name}}</option>
                @endforeach
                @else
                <option value=''>Selecione um usuario</option>
                @foreach ($usuarios as $usuario )
                <option value="{{$usuario->id}}" }}>{{$usuario->name}}</option>
                @endforeach
                @endif
            </select>
            @error('usuario_id')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="funcionario" class="control-label">Funcionario:</label>
            <select type="text" name="funcionario" id="funcionario" class="form-control @error('funcionario') is-invalid @enderror">
                @if(isset( $OrdemServicos->funcionario_id))

                @foreach ($funcionarios as $funcionario )
                <option value="{{$funcionario->id}}" {{$funcionario->id == $OrdemServicos->funcionario_id   ? 'selected' : ''}}>{{$funcionario->name}}</option>
                @endforeach
                @else
                <option value=''>Selecione Funcionario</option>
                @foreach ($funcionarios as $funcionario )
                <option value="{{$funcionario->id}}" }}>{{$funcionario->name}}</option>
                @endforeach
                @endif
            </select>
            @error('funcionario')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="obs" class="control-label">Observaçoes:</label>
            <input type="text" name="obs" id="obs" value="{{ isset( $OrdemServicos->obs) ? $OrdemServicos->obs : '' }}" class="form-control @error('obs') is-invalid @enderror" />
            @error('obs')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="data" class="control-label">data:</label>
            <input type="text" name="data" id="data" value="{{ isset( $OrdemServicos->data) ? $OrdemServicos->data : '' }}" class="form-control @error('data') is-invalid @enderror" />
            @error('data')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="status" class="control-label">Status:</label>
            <select type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                @if(isset( $OrdemServicos->status))
                <option value="">Selecione o status de imovel</option>
                <option value="Liberado" {{ $OrdemServicos->status === 'Liberado' ? 'selected' : ''}}>Liberado</option>
                <option value="Processando" {{ $OrdemServicos->status === 'Processando' ? 'selected' : ''}}>Processando</option>
                <option value="Finalizado" {{ $OrdemServicos->status === 'Finalizado' ? 'selected' : ''}}>Finalizado</option>
                @else
                <option value="">Selecione o status</option>
                <option value="Liberado">Liberado</option>
                <option value="Processando">Processando</option>
                <option value="Finalizado">Finalizado</option>
                @endif
            </select>
            @error('status')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
   
    
</div>