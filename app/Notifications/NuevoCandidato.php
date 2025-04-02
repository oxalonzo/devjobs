<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    public $id_vacante;
    public $nombre_vacante;
    public $usuario_id;

    /**
     * Create a new notification instance.
     */
    //le estamooso indicando que tomara un id de vacante, tomara un nnombre vacante tambien y tambien tomara el id de la persona que se esta postulando para esta vacante
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        //aqui se le especifica que ademas de enviarse la notificacion se tiene que almacenar en la base de datos con database
        //entonces recuerda este mail lo configuras en tomail
        //database se configura en todatabase
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */

     //tomail lo que hace es que pones la informacion que contendra el email 
     //este metodo le envia a un usuario un email 
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/notificaciones/' . $this->id_vacante);

        return (new MailMessage)
            ->line('Has recibido un nuevo candidato en tu vacante.')
            ->line('La vacante es: ' . $this->nombre_vacante)
            ->action('Ver notificaciones', $url)
            ->line('Gracias por utilizar DevJobs!');
    }

   
    // AAlmacena las notificaciones en la base de datos eso es lo que hace estoo metodo
    //como lo almacna en la base de datos hay que correr un par de comandos 
    //el primero es que cree esa tabla de notificaciones se crea la migracion con el siguiente comando sail artisan notifications:table
    //una vez creada la migracion se ejecuta con sail artisan migrate
    //ya teniendo la notificacion creada el sigueinte paso es decir a quien sera enviada la notificacion
    //
    public function toDatabase($notifiable){

        //aqui en todatabase se va a almacenar como un objecto en data
        //por eso el return con el arreglo para que lo devuelva como un objecto y ese objecto se almacena en la base de datos
        //ya aqui puedes agregar toda la informacion que quieras guardar en la base de datos para que despues el usuario la pueda leer
        //porque esa notificacion en este caso al podra ver el reclutador

        return [
                'id_vacante' => $this->id_vacante,
                'nombre_vacante' => $this->nombre_vacante,
                'usuario_id' => $this->usuario_id,
        ];


    }



     /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

     //toarray lo que hace es que alamacena en un arrreglo diferente informacion para esas notificaciones
     //por el moment no se va a utilizar
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }

}
