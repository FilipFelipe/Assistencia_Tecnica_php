<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table='ordem_servico';

    protected $fillable = [
        'usuario_id', 'funcionario_id', 'obs', 'data', 'status','ordem_servico',
    ];
    public function usuario() {
        return $this->belongsTo('App\Usuario', 'id');
    }

    public function funcionario() {
        return $this->belongsTo('App\Funcionario', 'id');
    }
}


