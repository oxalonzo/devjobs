<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\candidato;
use App\Notifications\NuevoCandidato;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    //validacionn mediante livewire
    protected $rules = [
        'cv' => 'required|mimes:pdf', //mimes indica solo acepta pdf
    ];


    //se utiliza un mount para que cuando cargue el componente para poostularse se traiga el id de la vacantte
    //ojo recuerda que para que lo traiga tienes que pasarle la variable desde el lugar donde este utilizando el componente ejemplo en posturlar-vacante que es el de este
   //se esta pasando a la variable vacante para despues declararla arriba como un objecto publico y usarla aqui
    public function mount(Vacante $vacante){
            $this->vacante = $vacante;
    }



    public function postularme()
    {
        //esto manda a llamar las reglas de vaalidacion que estaan arriba
        $datos = $this->validate();

      

        //almacenar el cv en el disco duro
        $cv = $this->cv->store('cv', 'public');
        $datos['cv'] = str_replace('cv/', '', $cv);

       
        //recuerda crear la relacion en este caso es entre vacante y candidato ya la hice en el modelo vacante
        //crear el candidacto a la vacante
        //aqui en vez de hacerlo con el modelo se esta haciendo con la relacion que lleva this despues el modelo vacante despues el metodo de relacion candidactos y se le pone parentesis porque no es a los datos que se va a hacer a lo que se quiere acceder es a las funciones 
        // candidato::create([
        //     'user_id' => Auth::user()->id,
        //     'vacante_id' => $vacante->id,
        //     'cv' => $datos['cv'],
            
        // ]);

        //la vcante no se le esta pasando de manera escrita porque gracias a la relacion que se realizo en el modelo de vacante ya sabe cual es el id
        //esos soon beneficios de laravel, que lo pasa automatico
        $this->vacante->candidactos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $datos['cv'],
        ]);


        //crear laa notificacion y enviar el email
        //con reclutadoor se tiene toda la instancia del usuario o informacion
        //es decir cuando entramos a esa vacante en especifica tiene un usario que fue quien la creo y que cuando cruzamos esa iformacion y creamos esa relacion y va a tener la instancia del reclutador en especifico
        //entonces se le pone notify y ese notify es el motodo que notificara a el usuario 
        //este nnotify va a tomar comoo parametro la notificacion que quieres enviar en este caso es la de nuevocandidato 
        //y dentro le especificas en el constructor los datos que quieras pasar haciaa la nootificacion nuevocandidato para que asi los metodos como tomail o todatabase puedan leer esa informacion de otra forma no tendrian froam de saber la informacion que tiene el componente de postularvacante 
        //por esoo nuevocandidato tiene el constructor para que le puedas pasar infromacion del componente en este caso postularvacante hacia la notificacion
        //hay que pasarle los tres valores que esta esperado en el constructor

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, Auth::user()->id));


        //mostrar el usuario un mensaje de ok
        
        session()->flash('mensaje', 'Se envió correctamente tu postulación, mucha suerte');
        return redirect()->back();

    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
