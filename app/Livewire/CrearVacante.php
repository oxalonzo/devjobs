<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{
    //esto actua como el controlador aqui puedes validar y consultar


    //para agarrar los valores desde el componente y comunicarlo con el backend
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;


    //recuerda esto es para que livewire pueda subir archivos o fotos tienes que indicarcelo 
    //si no te dara un error automaticamente ya de esa forma le decimos a livewire que queremos subir un archivo
    use WithFileUploads;


    //validacionn mediante livewire
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024', //1MB max y solo imagen
    ];


    //esta es la funncion que se esta mandando a llamar desde el compoonente wire:submit.prevent
    public function crearVacante()
    {
        //esto lo que hace es que aplica las reglas de arriba de la variante rules utilizo rules por las convenciones de laravel que la identifica de una vez como si fueran reglas
        //tienes que ponerle tules por aravel y sus convensiones
        //en caso de que marque error lo pasara a la vista y indicara donde estann los errores
        //pero en caso de que todo este bienn lo asignna a datos

        $datos = $this->validate();

        //en caso de que pase la validacion se creara el registro en caso contrario devolvera un mensaje de error
        //recuerda que de todos los archivos que tenemos aqui en laravel el usuario solo puede ver public por eso se almacena ahi
        //almacenar la imagen con livewire
        //esta en store/app/public/vacantes
        // $imagen = $this->imagen->storePublicly('vacantes');
        
        $imagen = $this->imagen->store('vacantes', 'public');
        

        //esto es para quitar public/vacantes/ de el nombre de la footo antes de guaardarlo en la base daatos
        //y el datos['imagen'] esta reescribieno el valor de la variable imagen ya solo con el nombre para guardarlo en la base de daatos 
        $datos['imagen'] = str_replace('vacantes/', '', $imagen);
        

        //esto es un componente de livewire pero no olvides que tienes acceso a todo lo que tiene laravel
        //recuerda que datos ya tiene todo el acceso al request del formulario y como es en array accedo mediante llaves
        //el id del usuario lo puedo tomar de que el foormulario esta restrinngido solo para usuario autenticado entonces eso le da acceso a los datos del modelo user y poder traer el usuario que esta en el momento trabajando 
        //crear la vacante con livewire
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'], 
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => Auth::user()->id
        ]);

        //crear un mensaje con livewire
        //lo hago mediante la funcion session que permite que mientra esta activa la session se pase ese mensaje 
        
        session()->flash('mensaje', 'La vacante se publicó correctamente'); 

        //redireccionar al usuario con livewire
        //si pones un to tienes que poner la url ejemplo return redirect()->to('/dashboar'); mejor utiliza route y pones el name
        return redirect()->route('vacantes.index');
    }

    public function render()
    {

        //esto trae todos los registro de la tabla salario con el modelo que lo mando a llamar abajo cuando escribo Salario::all() y all lo que hace que vengan todos
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
