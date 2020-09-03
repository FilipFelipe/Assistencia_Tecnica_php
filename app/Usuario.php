<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='Usuario';

    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'sexo','aniversario','telefone','cep','rua','numero','complemento','bairro','cidade','uf',
    ];
    public function funcionario(){

        return $this->hasMany('App\Funcionario','funcionario_id');
    }
}
