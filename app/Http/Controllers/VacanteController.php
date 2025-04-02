<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VacanteController extends Controller
{

    //esto es para poder utilizar la policies aqui en mi controlador del metodo edit que esta abajo
    use AuthorizesRequests;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //esto esta ligado con el policies viewAny que evita que alguien con el rol 1 no pueda ver esta vista y previene todo el acceso a todo lo relacionado coon este modelo
        //y en este caso se le pasa el mmodelo completo de vacante en vez de una instancia
        $this->authorize('viewAny', Vacante::class);

        //para mostrar
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //esto es para evitar que quien tenga rol 1 no pueda crear vacante porque es un programador
        $this->authorize('create', Vacante::class); 

        //para crear nuestras vacantes 
        return view('vacantes.create');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        //para mostrar los puesto de trabajo cuandoo de click en el titulo
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    //gracias a laravel ya que se esta iterando se puede traer el modelo de Vacante y asi obtenemos toda la informacion en un request de la vacante que se cliqueo para editar 
    public function edit(Vacante $vacante)
    {

        //para ejecutar la policies que se creo que evita que entren otros usuarios a editar sin se el usuario que la creo la vacante
        $this->authorize('update', $vacante);

        //para editar las vacantes
        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

    
}
