<?php

namespace App\Http\Controllers;

use App\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function novo_usuario() {
        return view('usuario.incluir');
    }
    public function index()
    {
        $usuarios = usuario::paginate(5);
        return view('usuario.index', ['usuario' => $usuarios]);
    }
    public function salvar_usuario(Request $request) {
        $usuario = new usuario([
            'name' => $request['name'],
            'telefone' => $request['telefone'],
            'cpf' => $request['cpf'],
            'password' => $request['password'],
            'sexo' => $request['sexo'],
            'aniversario' => $request['aniversario'],
            'rua' => $request['rua'],
            'email' => $request['email'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cep' => $request['cep'],
        ]);

        $usuario->save();

        return redirect('/usuario');
    }
    public function visualizar_usuario($id) {
        $usuario = usuario::find($id);
        return view('usuario.consultar', ['usuario' => $usuario, 'readonly' => true]);
    }
    public function excluir_usuario($id) {
        $usuario = usuario::find($id);
        return view('usuario.excluir', ['usuario' => $usuario, 'readonly' => true]);
    }
    public function alterar_usuario($id) {
        $usuario = usuario::find($id);
        return view('usuario.alterar', ['usuario' => $usuario]);
    }
    public function alterar(Request $request, $id) {
        $usuario = usuario::find($id);
        $usuario->name = $request['name'];
        $usuario->telefone = $request['telefone'];
        $usuario->cpf = $request['cpf'];
        $usuario->sexo = $request['sexo'];
        $usuario->aniversario = $request['aniversario'];
        $usuario->rua = $request['rua'];
        $usuario->numero = $request['numero'];
        $usuario->complemento = $request['complemento'];
        $usuario->bairro = $request['bairro'];
        $usuario->cidade = $request['cidade'];
        $usuario->uf = $request['uf'];
        $usuario->cep = $request['cep'];
        $usuario->save();
        return redirect('/usuario');
    }
    public function excluir(Request $request, $id) {
        $usuario = usuario::find($id);
        
        $usuario->delete();

        return redirect('/usuario');
    }
   
    
}
