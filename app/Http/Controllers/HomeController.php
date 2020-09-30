<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Chart;
use Illuminate\Support\Facades\db;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_auth = Auth::user();
        $valor_liberado = DB::table('ordem_servico')->where('status', '=', 'Liberado')->count();
        $valor_concluido = DB::table('ordem_servico')->where('status', '=', 'Concluido')->count();
        $valor_pross = DB::table('ordem_servico')->where('status', '=', 'Processando')->count();

        $valores=[1,2,20];
        
        //return view('welcome', ['user_auth' => $user_auth],compact('valores'),);
        return view('dashboard', ['user_auth' => $user_auth],compact('valores'));
    }
    
    
}
