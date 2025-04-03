<!--esto es un componente de livewire para poder crear el formulario de las vacantes-->
<!--importante es que puedes usar componentes de laravel dentro de livewire sin ningun problema-->
<!--recuerda que con el old de laravel que esta abajo cuando falla la validacion del formulario se autollena nuevamente con el old-->
<!--recuerda que puedes usar los componentes de laravel dentro del componente de livewire -->
<!--no olvides que el wire:model es como el name en los atributos html y se utiliza para comunicar con el backend-->
<!--con livewire no es necesario poner el CSRF porque eso ya lo maneja livewire-->
<!-- wire:submit.prevent es igual al preventdefault() de los formularios, esto es para enviar la informacion tambien del formulario --> 
<!-- al wire:submit.prevent se le esta pasando la funcion crearVacante -->

<form  class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante' >
    

    <!-- titulo -->
    <div>

        <x-input-label for="titulo" :value="__('Titulo Vacante')" />

        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full"
        type="text" 
        wire:model="titulo"
        :value="old('titulo')"
        placeholder="Titulo Vacante" 
        />

        @error('titulo')
          <livewire:mostrar-alerta :message="$message" />
        @enderror

        {{-- <x-input-error :messages="$errors->get('titulo')" class="mt-2" /> --}}
        
        <!--ejemplo sin un componnente del mensaje de error pero sin el php claro solo las etiqueta y lo otro-->
        @php
            //@error('titulo'){{ $mensaje }}@enderror
        @endphp 

    </div>

    <!-- el salario viene desde la base de datos, se creo un modelo y un seeder para imprimir el salario  -->
    <div>

        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select 
        wire:model="salario" 
        id="salario"
        class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm w-full"
        >

            <option value="">-- Seleccione --</option>

            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">-- {{ $salario->salario }} --</option>
            @endforeach

        </select>

        {{-- <x-input-error :messages="$errors->get('salario')" class="mt-2" /> --}}

        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>


    <!-- categoria vendra tambien de la base de datos se creo un modelo como un seeder, como migration tambienn y moostrar los resultados aqui -->
    <div>

        <x-input-label for="categoria" :value="__('Categoria')" />

        <select 
        wire:model="categoria" 
        id="categoria"
        class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm w-full"
        >

            <option value="">-- Selecciona una categoría --</option>
            @foreach ($categorias as $categoria)

                <option value="{{ $categoria->id }}">-- {{ $categoria->categoria }} --</option>

            @endforeach

        </select>

        {{-- <x-input-error :messages="$errors->get('categoria')" class="mt-2" /> --}}
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- empresa -->
    <div>

        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input 
        id="empresa" 
        wire:model="empresa"
        class="block mt-1 w-full" 
        type="text" 
        wire:model="empresa"
        :value="old('empresa')"
        placeholder="Ejemplo: ej. Netflix, Uber, Shopify" 
        />

        {{-- <x-input-error :messages="$errors->get('empresa')" class="mt-2" /> --}}
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- ultimo dia para postularse -->
    <div>

        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />

        <x-text-input 
        id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" 
        wire:model="ultimo_dia" 
        :value="old('ultimo_dia')" 
        />

        {{-- <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" /> --}}
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!--descripcion del puesto de trabajo -->
    <div>

        <x-input-label for="descripcion" :value="__('Descripción Puesto')" />

        <textarea 
        wire:model="descripcion" 
        id="descripcion"
        class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm w-full h-72"
        placeholder="Descripció general del puesto,  experiencia"
        ></textarea>

        {{-- <x-input-error :messages="$errors->get('descripcion ')" class="mt-2" /> --}}
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- imagen -->
    <div>

        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input 
        id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model="imagen_nueva" 
        accept="image/*"
        />

        <div class="my-5 w-80">
            <x-input-label  :value="__('Preview Imagen Actual')" />

            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'imagen Vacante ' . $titulo }}">
        </div>


        <div class="my-5 w-80">
            <!--esto es gracia a que livewire soporta two way data bulding que significa que cuando envio un dato soporta devolverme un dato tambien aal mismo tiempo por eso se ve la imagen en preview-->
            <!-- dentro de imagen se puede ver la imagen porque tenemos aacceso a un metodo que se llama temporaryUrl y de esa forma lo manda a llamar para poder ver un preview la iamgen -->
            <!-- al final recuerda es una imagen temporal no es la imagenn final que se a subido hasta que le des a crear publicacion-->
            @if ($imagen_nueva)
                <x-input-label  :value="__('Preview Imagen nueva')" />

                <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="previewimage">
            @endif
        </div>

        {{-- <x-input-error :messages="$errors->get('imagen')" class="mt-2" /> --}}
        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <x-primary-button >
        Guardar Cambios
    </x-primary-button>



</form>
