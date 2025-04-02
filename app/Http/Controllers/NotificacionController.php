<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */

    //esto es porque solamente queremos acceder a la lista de notificaciones 
    //esto es porqu eno vamos a tener un panel de actualizarla ni eiinarlas solo queremos acceder a la lista de notificaciones
    //en estte caso un controlador de tipo ivocable va a tener unicamente este metodo y cuando lo utilizas en el web.php lo pasa en el controlador

    public function __invoke(Request $request)
    {
        //las notificaciones se estan pudiendo trae gracias a el metodo reclutador en postular vacante
        //guarada esa referencia de a que usuario va a notifiacar y entonces gracias a eso con la validacion de que sabe el usuario 
        //mas un afuncion llamadaa unreadNotifications se trae todas las notoificaciones de ese usuario aun no ha leido

        $notificaciones = Auth::user()->unreadNotifications;

        //limpiaar nootificaciones despues que la vean
        //ese de mark es un metodo que exite que marca las notificaciones no leidas como leidas al momento de cuando las habran
       //o recargues la pagina tipoo faceboook cuando ya abres las notificaciones que se borran automaticamente
        Auth::user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
