<?php

namespace App\Http\Middleware;

use Closure;

class Registro
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Define se um usuário está registrado ou não e a partir disso o
        //redireciona para a devida tela
        if (auth()->user()->is_registered == 1) {
            return $next($request);
        }
        return redirect('/')->with('success', 'Sua requisição para acessar o sistema foi enviada à nossos administradores!');

    }
}
