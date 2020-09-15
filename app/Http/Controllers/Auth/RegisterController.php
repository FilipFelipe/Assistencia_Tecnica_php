<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

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
            'sexo'=> ['required', 'string', 'max:20'],
            'aniversario'=> ['required', 'string', 'max:10'],
            'telefone'=> ['required', 'string', 'max:20'],
            'cep'=> ['required', 'string', 'max:20'],
            'rua'=> ['required', 'string', 'max:255'],
            'numero'=> ['required', 'string', 'max:10'],
            'complemento'=> ['required', 'string', 'max:255'],
            'bairro'=> ['required', 'string', 'max:255'],
            'cidade'=> ['required', 'string', 'max:255'],
            'uf'=> ['required', 'string', 'max:2'],
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
        return redirect()->route('page.login');
    }
    public function index() {
        return view('auth.register');
    }
}

            