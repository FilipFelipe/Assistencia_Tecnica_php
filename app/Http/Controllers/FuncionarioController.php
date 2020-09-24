<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FuncionarioController extends Controller
{
    public function index()
    {   $user_auth= Auth::user();
        $funcionario = funcionario::paginate(5);
        return view('funcionario.index', ['funcionarios' => $funcionario],['user_auth' => $user_auth]);
    }
    public function novo_funcionario() {
        $user_auth= Auth::user();
        return view('funcionario.incluir',['user_auth' => $user_auth]);
    }
    public function salvar_funcionario(Request $request) {
        $funcionario = new funcionario([
            'name' => $request['name'],
            'telefone' => $request['telefone'],
            'email' => $request['email'],
            'password' => $request['password'],
            'cpf' => $request['cpf'],
            'sexo' => $request['sexo'],
            'aniversario' => $request['aniversario'],
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cep' => $request['cep'],
        ]);
        $funcionario->save();

        return redirect('/funcionario');
    }
    public function alterar(Request $request, $id) {
        $funcionario = funcionario::find($id);
        $funcionario->name = $request['name'];
        $funcionario->telefone = $request['telefone'];
        $funcionario->cpf = $request['cpf'];
        $funcionario->sexo = $request['sexo'];
        $funcionario->aniversario = $request['aniversario'];
        $funcionario->rua = $request['rua'];
        $funcionario->numero = $request['numero'];
        $funcionario->complemento = $request['complemento'];
        $funcionario->bairro = $request['bairro'];
        $funcionario->cidade = $request['cidade'];
        $funcionario->uf = $request['uf'];
        $funcionario->cep = $request['cep'];
        $funcionario->save();
        return redirect('/funcionario');
    }
    public function visualizar_funcionario($id) {
        $funcionario = funcionario::find($id);
        $user_auth= Auth::user();
        return view('funcionario.consultar', ['funcionario' => $funcionario, 'readonly' => true],['user_auth' => $user_auth]);
    }


    public function alterar_funcionario($id) {
        $funcionario = funcionario::find($id);
        $user_auth= Auth::user();
        return view('funcionario.alterar', ['funcionario' => $funcionario],['user_auth' => $user_auth]);
    }

    public function excluir_funcionario($id) {
        $funcionario = funcionario::find($id);
        $user_auth= Auth::user();
        return view('funcionario.excluir', ['funcionario' => $funcionario, 'readonly' => true],['user_auth' => $user_auth]);
    }
    
    public function excluir(Request $request, $id) {
        $funcionario = funcionario::find($id);
        
        $funcionario->delete();

        return redirect('/funcionario');
    }
    

}
