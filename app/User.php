<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\bcrypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'sexo', 'aniversario', 'telefone', 'cep', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'uf',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function ordem()
    {
        return $this->hasMany('App\OrdemServico', 'id', 'id');
    }

    public static function sendEmailVerification($user)
    {
        $activate_code = bcrypt(Str::random(15));
        $user->remember_token = $activate_code;
        $user->save();
        $viewData['full_name'] = $user->name;
        $email_code = $user->remember_token;
        $viewData['link'] = asset('/verify_account?token=') . $email_code;
        Mail::send('auth.email_verification', $viewData, function ($m) use ($user) {
            $m->from('teste@teste.com', 'Ativacao do usuario no sistema');
            $m->to($user->email, $user->name)->subject('email de confirmacao');
        });
    }
    public static function requestPasswordReset($email)
    {
        self::generatePasswordResetToken($email);
        return self::sendPasswordResetEmail($email);
    }
    public static function generatePasswordResetToken($email)
    {
        if (User::where('email', $email)->first()) {
            DB::table('password_resets')->where('email', $email)->delete();
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => bcrypt(Str::random(15)),
                'created_at' => Carbon::now(),
            ]);
        }
    }

    public static function sendPasswordResetEmail($email)
    {
        $token = DB::table('password_resets')->where('email', $email)->first();

        if ($token) {
            $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
            $viewData['full_name'] = $user->name;
            $viewData['link'] = asset('/reset_password?token=') . $token->token;
            Mail::send('auth.email_verification', $viewData, function ($m) use ($user) {
                $m->from('teste@teste.com', 'Ativacao do usuario no sistema');
                $m->to($user->email, $user->name)->subject('Recuperar Senha');
            });
            return true;
        }
        return false;
    }
}
