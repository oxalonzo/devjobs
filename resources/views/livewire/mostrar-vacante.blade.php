<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>


        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10 shadow">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>

            <!--muestra la categoria desde la tabla categoria gracia a la relacion que hay en el modelo vacante.php-->
            <!--lo que tiene la variable vacante accede al metodo categoria que accede a la columna categoria de la tabla-->
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>

    </div>

    <div class=" md:grid md:grid-cols-6 gap-4 ">

        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="imagen de la vacante: {{ $vacante->titulo }}">
        </div>

        <div class="md:col-span-4 bg-gray-50 p-4 shadow">
            <h2 class="text-2xl font-bold mb-5">Descripción del puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest

        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600 hover:text-indigo-800"
                    href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a></p>
        </div>

    @endguest

    <!--laravel tambien te da directivas para conectar con esos rooles del policies desde una vista-->
    <!--//ejemplo can('create', vacante::class) endcan se le pasa el nombre de la funcion de la policies y el paarametro en este caso toma el modelo completo-->
    <!--entonces esto se comporta igual que un if por eso el else el contrario lo que hace es que solo a loos dev permite ver el foormulario-->
    
    {{-- @can('create', App\Model\Vacante::class)
        este es un reclutador
    @else
        <livewire:postular-vacante />
    @endcan --}}

    <!--no puede crear vacantes-->
    <!--esto solo permite ver el formulario a las persona de rol 1 o sea programadores nada mas-->
    <!--que no se te olvide que para poder utilizar la variable de vacante y sepa en que vacante_id esta es necesario pasarla con una variable dinamica a el componente y ahi ya puedes usar en postular vacante la variable o la informacion de la vacante donde te encuentras -->
    @cannot('create', App\Model\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcan


</div>
