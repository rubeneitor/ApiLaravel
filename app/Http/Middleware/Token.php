<?php

namespace App\Http\Middleware;
use Illuminate\Database\QueryException;
use App\Models\Usuario;
use Closure;

class Token
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

        //recogemos el usertype (candidato o empresa) por body además del token


        $token = $request->input('token');


        //si es candidato...
  

           try {

                $q = Usuario::where('token', 'LIKE', $token)->first();
            
                if(!$q){
                    //token no coincide.. return
                    return; 
                }
             
                return $next($request);

           } catch(QueryException $err) {
                return $err;
           }
        
    }
}