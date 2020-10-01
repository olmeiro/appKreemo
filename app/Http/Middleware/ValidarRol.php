<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use\App\Models\User;

class ValidarRol
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
        $user = Auth::user(); //información de usuario que está logueado.
        $permisos = User::$permisos[$user->rol_id]; //coger permisos según rol.
        $request_url = $request->getRequestUri(); //obtine url
        $url = explode("?", $request_url)[0];

        $filtro = array_filter($permisos, function($item) use($url,$request){

            if(strpos($url, $item["url"]) !== false){        //url de peticion !== (diferente) false diferente de false a la del array
                if($request->isMethod($item["method"])){     //metodo de peticion == a metodo de array
                    if($item["identica"]){                   // es identica en user.php true
                        if($item["url"] == $url){            // url de peticion es igual a url del array en user
                            return true;
                        }
                    }else{
                        return true;
                    }
                }
            }
            return false;
        });
       //dd($url, $permisos,$filtro);
       if(count($filtro) == 0)
       {
           return redirect("home");
       }
        return $next($request);
    }
}

//en Middleware
