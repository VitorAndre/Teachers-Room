<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        //Define se um usuário é admin ou não e a partir disso o
        //redireciona para a devida tela
        if (auth()->user()->is_admin == 1) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Somente Admin');
    }
}
