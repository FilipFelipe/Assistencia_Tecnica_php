<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class usuarioController extends Controller
{
    public function novo_usuario() {
        return view('usuario.incluir');
    }
    public function index()
    {
        $usuarios = user::paginate(5);
        $user_auth= Auth::user();
        return view('usuario.index', ['usuario' => $usuarios],['user_auth' => $user_auth]);
    }
    public function salvar_usuario(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);
        $usuario = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'cpf' => $request['cpf'],
            'sexo' => $request['sexo'],
            'aniversario' => $request['aniversario'],
            'telefone' => $request['telefone'],
            'cep' => $request['cep'],
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'password' => Hash::make($request['password']),
        ]);
        $usuario->save();
        return redirect()->route('listar_usuario')->with('success', 'Usuário criado com sucesso! :)');
    }
    public function visualizar_usuario($id) {
        $user_auth= Auth::user();
        $usuario = user::find($id);
        return view('usuario.consultar', ['usuario' => $usuario, 'readonly' => true],['user_auth' => $user_auth]);
    }
    public function excluir_usuario($id) {
        $user_auth= Auth::user();
        $usuario = user::find($id);
        return view('usuario.excluir', ['usuario' => $usuario, 'readonly' => true],['user_auth' => $user_auth]);
    }
    public function alterar_usuario($id) {
        $user_auth= Auth::user();
        $usuario = user::find($id);
       
        return view('usuario.alterar', ['usuario' => $usuario,'senha' => true],['user_auth' => $user_auth]);
    }
    public function alterar(Request $request, $id) {
        $usuario = user::find($id);
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
        return redirect()->route('listar_usuario')->with('success', 'Usuário alterado com sucesso! :)');
    }
    public function excluir(Request $request, $id) {
        $usuario = user::find($id);
        $usuario->delete();
        return redirect()->route('listar_usuario')->with('success', 'Usuário excluído com sucesso! :)');
    }
   
    
}
