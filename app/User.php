<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetdeSenha;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = [
        'nome', 'email', 'matricula', 'password', 'is_admin', 'is_registered',
        'provider', 'provider_id'
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

    public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetdeSenha($token));
    }
	//Define as relações deste Banco de Dados
    

    public function metodologias(){
        return $this->hasMany('App\Model\Metodologia');
    }

}
