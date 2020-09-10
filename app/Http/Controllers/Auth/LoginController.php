<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(User $user)
    {
        $this->middleware('guest')->except('logout');
        $this->repository = $user;
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = $this->repository->where('email',$email)->first();
        if($user){
            if(Auth::check()|| ($user && hash::check($password,$user->password))){
                Auth::login($user);
                if($user->is_active == 1){
                    return redirect()->route('home');
                }
                else{
                    return redirect()->route('page.login')->with('fail','Verifique o email!');
                }
            }else{
                return redirect()->route('page.login')->with('fail','Senha Inválida!');
            }
        }
        else{
            return redirect()->route('page.login')->with('fail','usuario nao encontrado!');
        }
        return redirect()->route('page.login')->with('fail','Falha no login, tente novamente!');
    }
    public function carregalogin()
    {
        return view('auth.login');
    }
}
