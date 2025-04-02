<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Candidato extends Model
{
    //para guardar a los candidaactos


     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    protected $fillable = [
        'user_id',
        'vacante_id',
        'cv',
    ];



    //relaion de cadidato hacia usuario para traer la informacion del user_id
    //se poner user para no tener que especificar la llave foranea de la tabla users
    //un user_id pertenece a un usuario
    //esto ya nos permite pooder acceder a la informacion del usuario y usarlo en candidatos
    public function user(){
        return $this->belongsTo(User::class);
    }

}
