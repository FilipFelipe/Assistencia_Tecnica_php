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
        $valores=[1,2,20];
        $usuarios = user::paginate(5);
        $user_auth= Auth::user();
        return view('usuario.index', ['usuario' => $usuarios],['user_auth' => $user_auth],compact('valores'));
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
        if($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()){

            $name = $request->file('profile_pic')->getClientOriginalName();
            $horario = time();
    
            $filename = "{$horario}_{$name}";
            $databasename = "/storage/img/{$filename}";
    
            $upload = $request->file('profile_pic')->storeAs('img', $filename);
            if(!$upload) {
                return redirect()->back()->with('error', 'falha ao fazer upload')->withInput();
            }
            $usuario->profile_pic = $databasename;
        }

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
        
        if($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()){
            $name = $request->id;
            $horario = time();
            $filename = "{$horario}_{$name}";
            $databasename = "{$filename}";
            $upload = $request->file('profile_pic')->storeAs('img', $filename);
            if(!$upload) {
                return redirect()->back()->with('error', 'falha ao fazer upload')->withInput();
            }
            $usuario->profile_pic = $databasename;
        }

        $usuario->save();
        return redirect()->route('listar_usuario')->with('success', 'Usuário alterado com sucesso! :)');
    }
    public function excluir(Request $request, $id) {
        if ( Auth::user()->id == $id ){
            return redirect()->route('listar_usuario')->with('fail','Você não pode ser excluído! '); 
        }
        else{
            $usuario = user::find($id);
            $usuario->delete();
            return redirect()->route('listar_usuario')->with('success', 'Usuário excluído com sucesso! :)');
        }
        
    }
   
    
}
