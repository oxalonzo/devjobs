<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{

    //recuerda que tienes que poner la variable dinamica aaqui primero antes que la vista para que se pase para alla
    public $message;

    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
