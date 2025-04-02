<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    //para las vacantes

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    //definir una variable para guardar el formato ultimo dia y en ves de que se guarde en string se guaarda en tipo dates asi me permite usar la funcion format en el componente de mostrar vacante y mostrarlo tipo fecha 
    //esta es la nueva forma de formatear la fecha junto con la funcion de format ('d/m/Y) en la vista 
    //Laravel convertirá automáticamente el valor almacenado en la base de datos en una instancia de Carbon\Carbon, permitiéndote hacer operaciones con fechas fácilmente.
    //Esto funciona sin necesidad de protected $dates, ya que casts lo reemplaza completamente.
    protected $casts = [
        'ultimo_dia' => 'datetime'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [

        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];


    //aqui es para que el componente de mostrar-vacante cuando muestre la categoria tenga acceso a categoria y en vez del numero
    //traiga la caategoria(nombre de la categoria) a la que pertenece ese id de categoria_id por eso la relacion 
    //no olvides que se llama categoria la relacion para que lo identifique con la coolumna de categoria_id de arriba

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //se importa el modelo de salario y permite entrar a la informacion del salario desde su tabla con el id traido
    //gracias a esta relacion para mostrarlo en mostrar-vacante 
    public function salario(){
        return $this->belongsTo(Salario::class);
    }


    //esta relacion es para decir que una vacante tiene muchso candidactos
    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }

     //aqui importante es que ya uno se sale de la forma en como laravel espera que se llame poorque no exite el moodelo de reclutador 
     //estamos es usando el de usuario
     //en este caso estamos creandoo la relacion uno a uno de que una vacante pertenece a un usuario
     //se le esepcifica porque no exite el modelo de reclutador asi que se le dice que es a user_id por eso mismo para qu ela identifique 
     //esta relacion va a ser hacia la persona que publico esta vacante
     public function reclutador(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
