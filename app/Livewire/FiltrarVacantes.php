<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\salario;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;


    public function leerDatosFormularios()
    {
        //enviamos la informmacion de un componente hacia otro componente
        //emitimos el evento de terminosBusqueda eso se va a ir hacia el padre que es homevacantes
        //ya aqui esta comunicandose desde el hijo que es este hacia el padre
        //les paso los valores yaa capturados del formulario
        $this->dispatch('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
          
    }

    public function render()
    {

        $salarios = salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
