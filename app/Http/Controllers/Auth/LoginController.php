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
        $user = $this->repository->where('email', $email)->first();
        if ($user) {
            if (Auth::check() || ($user && hash::check($password, $user->password))) {
                if ($user->is_active == true) {
                    Auth::login($user);
                    return view('dashboard');
                } else {
                    return redirect()->route('page.login')->with('fail', 'Verifique o email para ativar a sua conta!');
                }
            } else {
                return redirect()->route('page.login')->with('fail', 'Seu e-mail ou senha informados são inválidos');
            }
        } else {
            return redirect()->route('page.login')->with('fail', 'Seu e-mail ou senha informados são inválidos');
        }
        return redirect()->route('page.login')->with('fail', 'Falha no Login - Tente novamente');
    }
    public function carregalogin()
    {
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
   
}
