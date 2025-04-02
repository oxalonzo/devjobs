<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{

    //aqui es para evitar que un usuario pueda ver la vista notificaciones si es de rol de develooper === 1 
    //tambien se podia hacer con un policies pero el beneficio de los middleware es que cuando utilizas uno puedes rredirigir al
    //usuarioo a otra pagina a diferencia de los policies 
    //si quieres asegurarte de que ua funcion se ejecute antes de mostrarse algo en pantalla el middleware es una de las mejores opciones


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //ojo si detectas que tienes un middleware y lo estas llenando de muchos if lo mejor es crear varios middlewares

        //en caso de que no sea el rol 2 redireccioonar al usuario hacia home
        //el polocies como genera un codigo 403 ya no permite redireccionar por eso la diferenci de cuando e un middleware se ejecuta que es en el routing y no genera codigos de error permite redireccionar
       if (Auth::user()->rol === 1) {
        return redirect()->route('home');
       }
       

        //este next al igual que en nodes y espress hace lo mismo manda a llamaar al siguiente middleware
        //despues que lo creas el middleware aqui tienes que dejaarle saber a laraavel que este middlewaare exite 
        return $next($request);
    }
}
