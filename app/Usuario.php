<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='Usuario';
    //Desativado!!
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'sexo','aniversario','telefone','cep','rua','numero','complemento','bairro','cidade','uf',
    ];
    
    
}
