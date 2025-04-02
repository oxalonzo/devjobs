<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Carbon;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{
    //esto es el nombre del atributo interno de nuestro componente no puedo usar id porque es palabra reservada de livewire por me da error si lo quiero pasar directo
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    //atributo nuevo para no foorzar al usuario a que ponga una imagen cuando este editando la vacante, si no que se guarde con la imagen anterior o si sube una imagen que la reescriba en la base de datos
    public $imagen_nueva;

    use WithFileUploads;

    //validacionn mediante livewire de cuando esta editando los campo recuerda que es $rules por las convensiones de laravel y para que las reconozca mas abajoo ene l metodo editarvacante
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024', //1MB max y solo imagen|nullable lo que dice es que el campo puede ir vacio pero en caso de que tenga una algo tiene que se una imagen
    ];


    //mount es un metodo que se ejecutta una sola vez cuandoo el componente es instanciado pero para usarlo en este caso se necesita parar el modelo como parametro y la instancia que esta haciendo 
    //esto se esta utilizando para rellenar con livewire el formulario del componente editar-vacante
    public function mount(Vacante $vacante)
    {

        //una vez que es instanciada la vacante arriba como paramento y ponga public los campos arriba se asigna aqui con cada uno de los campos para que lo rellene
        //recuerda que en la parte de vacante tienes que llamarlo como en la base de datos
        //laravel tiene una dependencia llamada carbon para pooder cumplir el formato que me pide la web y asi se pueda rellenar la fecha y actualizar
        //con carbon formato la fecha y cambio el formato igual a lo que hice en el modelo de vacante y en el componente de livewire mosotrar-vacante

        $this->vacante_id = $vacante->id; //vacante-.id es el que viene desde la base de datos por eso no se debe cambiar, es igual que la columna 
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }



    //metodo para editar el formulario recuerda que la validacion esta arriba
    public function editarVacante()
    {

        //en dato0os esta asignado lo utilmo que el usuario ingreso en el formulario
        $datos = $this->validate();

        //si hay una nueva imagen en la variable image_nueva 
        //si hay una nueva imagen se agrega ua nueva posicion llamada imagen dentro del array

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('vacantes', 'public');
            $datos['imagen'] = str_replace('vacantes/', '', $imagen);
        }
       

        //encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //asignar los valores 
        //vacante es un objecto vienen desde la base de datos y datos es un arreglo de la informacion que trae
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen; //ya aqui si se comprueba que tiene una nueva imagen asigna el valor nuevo y si nno asigna el valor viejo que ya tenia anteriormente

        //guardar la vacante

        $vacante->save();

        //redireccionar
        session()->flash('mensaje', 'La vacante se actualizó correctamente');
        return redirect()->route('vacantes.index');

        
    }


    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
