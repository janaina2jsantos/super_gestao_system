<?php

namespace App\Http\Middleware;
use App\Models\LogAccess;

use Closure;

class LogAccessMiddleware
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
        $ip   = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAccess::create([
            'log' => "The IP $ip requested the route $rota"
        ]);

        // ** Manipulando a resposta(response) que vem no $next
        // $teste = $next($request);
        // $teste->setStatusCode(401, 'Jana é Show!');
        // return $teste;

        return $next($request);
    }
}
