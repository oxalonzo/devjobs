<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{

    //esta son todas las accionens que podemoso prevenir 
    //Las policies de Laravel son una función que permite a los desarrolladores definir reglas de autorización para los recursos dentro de sus aplicaciones, incluidos modelos, vistas y acciones.
    //Laravel ofrece dos formas principales de autorizar acciones: puertas y políticas . Piense en puertas y políticas como rutas y controladores.

    //ojo estos van a ser permisos que van a tener en la aplicacion que se determina por medio de ese policies 
    //un usuario puede o no puede hacer ciertas acciones 
    //laravel tambien te da directivas para conectar con esos rooles del policies
    //ejemplo @can('create', vacante::class) @endcan se le pasa el nombre de la funcion de la policies y el paarametro en este caso toma el modelo completo

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //esto es para que solo los usuario con rol 2 tenga acceso a la vista de crear vacantes y todo lo relacionado a las vacantes
        //lo policies en este caso que no se le pasa una instancia se le pasa el modelo completo de la bse de datos para prevenir el acceso a esos modelos
        //esto evita que usuario con rol 1 entren al modelo de vacante

        //aqui le decimos que el usuario que esta visitando el este panel de vcante tiene el rol numero 2
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vacante $vacante): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //aqui evita que quien tenga un rol 1 no podra creaar vacante
        return $user->rol === 2;;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacante $vacante): bool
    {
        //verifica que el usuario autenticado que ve la vacante y esta tratando de editarla  es el mismo user_id de la vacante si no lo es no le permitira hacerlo
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacante $vacante): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacante $vacante): bool
    {
        return false;
    }
}
