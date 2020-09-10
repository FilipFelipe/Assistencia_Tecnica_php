<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table='funcionario';

    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'sexo','aniversario','telefone','cep','rua','numero','complemento','bairro','cidade','uf',
    ];
    public function ordem() {
        return $this->hasMany('App\OrdemServico', 'funcionario_id');
    }
}
