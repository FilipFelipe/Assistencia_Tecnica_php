<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='Usuario';

    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'sexo','aniversario','telefone','cep','rua','numero','complemento','bairro','cidade','uf',
    ];
    
    public function ordem() {
        return $this->hasMany('App\OrdemServico', 'usuario_id');
    }
}
