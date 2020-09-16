<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Usuario;
use App\OrdemServico;
use App\User;
use Illuminate\Http\Request;
use OrdemPecas;

class OrdemServicoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index() {
        $Ordens = OrdemServico::paginate(5);
        //dd($Ordens);
        return view('ordem_servico.index', ['OrdemServicos' => $Ordens]);
    }

    public function ordem_funcionario($id) {
        $funcionarios = Funcionario::find($id)->funcionarios;

        return view('ordem_servico.funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function ordem_usuario($id) {
        $usuarios = User::find($id)->usuarios;

        return view('ordem_servico.usuarios', ['usuarios' => $usuarios]);
    }

    public function nova_ordem() {
        $funcionarios = Funcionario::all();
        $usuarios = User::all();

        return view('ordem_servico.incluir', ['funcionarios' => $funcionarios, 'usuarios' => $usuarios]);
    }

    public function salvar_ordem(Request $request) {
        $ordem = new OrdemServico([
            
            'funcionario_id' => $request['funcionario'],
            'usuario_id' => $request['usuario'],
            'obs' => $request['obs'],
            'data' => $request['data'],
            'status' => $request['status'],
            'ordem_servico' => $request['ordem_servico'],
        ]);

        $ordem->save();

        return redirect('/ordem_servico');
    }
    public function alterar_ordem(Request $request, $id) {
        $ordem = OrdemServico::find($id);

        $ordem->funcionario_id = $request['funcionario'];
        $ordem->usuario_id = $request['usuario'];
        $ordem->obs = $request['obs'];
        $ordem->data = $request['data'];
        $ordem->status = $request['status'];
        $ordem->ordem_servico = $request['ordem_servico'];
       
        $ordem->save();
        
        return redirect('/ordem_servico');
    }

    public function excluir_ordem($id) {
        $OrdemServicos = OrdemServico::find($id);
        $funcionarios = Funcionario::all();
        $usuarios = User::all();
        return view('ordem_servico.excluir', ['OrdemServicos' => $OrdemServicos, 'funcionarios' => $funcionarios, 'usuarios' => $usuarios]);
    }

    public function excluir($id) {
        $ordem = OrdemServico::find($id);
        $ordem->delete();
        return redirect('/ordem_servico');
    }

    public function consultar_ordem($id) {
        $OrdemServicos = OrdemServico::find($id);
        $funcionarios = Funcionario::all();
        $usuarios = User::all();
        return view('ordem_servico.consultar', ['OrdemServicos' => $OrdemServicos, 'funcionarios' => $funcionarios, 'usuarios' => $usuarios]);
    }

    public function alterar($id) {
        $OrdemServicos = OrdemServico::find($id);
        $funcionarios = Funcionario::all();
        $usuarios = User::all();
        return view('ordem_servico.alterar', ['OrdemServicos' => $OrdemServicos, 'funcionarios' => $funcionarios, 'usuarios' => $usuarios]);
    }

 
}