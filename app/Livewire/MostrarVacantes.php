<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MostrarVacantes extends Component
{

    protected $listeners = ['eliminadoVacante'];

    public function eliminarVacante($vacante)
    {

        $this->dispatch('eliminadoVacante', $vacante);
    }

    public function eliminadoVacante(Vacante $vacante)
    {
            $vacante->delete();

             //redireccionar
            session()->flash('mensaje', 'La vacante se elimino correctamente');
            return redirect()->route('vacantes.index');

    }    


    public function render()
    {

        $vacantes = Vacante::where('user_id', Auth::user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }
}
