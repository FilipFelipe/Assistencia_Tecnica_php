<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sexo' => ['required', 'string', 'max:20'],
            'aniversario' => ['required', 'string', 'max:10'],
            'telefone' => ['required', 'string', 'max:20'],
            'cep' => ['required', 'string', 'max:20'],
            'rua' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:10'],
            'complemento' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'max:2'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function registrar(Request $request)
    {

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


        if ($usuario->save()) {
            $usuario->sendEmailVerification($usuario);
            return redirect()->route('user.login')->with('success', 'email cadastrado com sucesso!');
        }
        //return redirect()->route('page.login');
        return redirect()->route('user.login')->with('fail', 'Falha na gravacao das informacoes');
    }
    public function index()
    {
        return view('auth.register');
    }

    public function verify_account(Request $request)
    {
        $usuario = User::where('remember_token', $request['token'])->first();
        if (isset($usuario)) {
            if ($usuario->is_active == 1) {
                return redirect()->route('user.login')->with('fail', 'E-Mail Já Validado, faça o Login!');
            } else {
                $usuario->remember_token = null;
                $usuario->is_active = true;
                $usuario->email_verified_at = Carbon::now();
                $usuario->save();
                return redirect()->route('user.login')->with('success', 'E-Mail Validado com Sucesso!');
            }
        }
        return redirect()->route('user.login')->with('success', 'E-Mail Já Validado, faça o Login!');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'requerid|exists:user,email',
        ]);
        $usuario = User::where('email', $request->email)->first();
        if ($usuario) {
            $resposta = User::requestPasswordReset($usuario->email);
            if ($resposta) {
                return redirect()->route('user.login')->with('success', 'Confirme sua caixa de E-Mail');
            }
        } else {
            return redirect()->route('user.login')->with('fail', 'Aconteceu um erro inesperado :(');
        }
    }
    public function mailpage()
    {
        return view('auth.check_reset_email');
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'requerid|exists:user,email',
        ]);
        $tokeData = DB::table('password_resets')->where('token', $request->reset_token)->first();
        if(!$tokeData){
            return redirect()->route('user.login')->with('fail', 'Token Inválido :(');
        }
        $usuario = User::where('email',$tokeData->email)->first();
        $usuario->password = bcrypt($request->password);
        $usuario->update();
        DB::table('password_resets')->where('email', $usuario->email)->delete();
        return redirect()->route('user.login')->with('success', 'Senha Alterada com Sucesso! :)');
    
    }
}
