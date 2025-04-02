<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{


    public $termino;
    public $categoria;
    public $salario;


    //aqui escucha por termino busqueda que lo identifica a la funcion buscar
    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;

       
    }



    public function render()
    {
        // $vacantes = Vacante::all();

        //en el caso de laravel si utilizas un where es porque ese valor existe
        //paara realizar las consultas el equipo de laravel agrego algo que es una liga de uno llamado when y otro llamado where 
        //el when solo se ejecuta si loos valores de arriba tienen algo si estan vacios no se ejecutan
        //entonces si el when encuentra algo se le pone el valor a buscar y un callback (funcion) y a esa funcion se le pasa como primer valorr el query actual y a ese query se le aplica el where
        //el termino de busqueda en este caso es para buscar el titulo de la vacante 
        //PRIMER parametro es lo que busca, el segundo indicando como lo busca y el tercero es la busqueda y tiene los operadores para que lo busque en cualquier parte que la columaan titulo lo tenga
        //los operadoores lo que dicen que no importa si esta en el inicio o el final pero lo va a encontrar
        //el LIKE es un operador que se utiliza para hacer busqueda en base de datos en sql
        //el otro busca la categoria si hay y ejecuta igual que el termino si lo encuentra
        //en categoria indica ya que tiene que se igual se le pasa la columna categoria_id igual a la variable categoria

        $vacantes = Vacante::when($this->termino, function($query) {
            $query->where('titulo', 'LIKE', '%' . $this->termino . '%');
         })
         ->when($this->termino, function($query) {
            //esto lo que hace es que busca el termino en el titulo o en la empresa a ver si aparece 
            $query->orWhere('empresa', 'LIKE', '%' . $this->termino . '%');
         })
         ->when($this->categoria, function($query) {
            $query->where('categoria_id', $this->categoria);
         })
         ->when($this->salario, function($query) {
            $query->where('salario_id', $this->salario);
         })->paginate(20);


        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
