<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salario extends Model
{
    //para consultar la tabla salario y traerlos a la vista para eso es esto
    //como se creo como modelo tenemos acceso a toodos los metodos del orm eloquent en este caso 

    //para las vacantes

     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     /**
      * The attributes that are mass assignable.
      *
      * @var list<string>
      */
     protected $fillable = [
         
     ];
}
