<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!--aqui indica que si exite la session de cuando entramos a creaar vacante se generara un mensaje que lo mostrara aqui, la session se gennera cuando entro a crear vacante o a editar una vacante oo cualquier ootra cosaa que se crea y este relacionado cn este cmponente -->
            @if (session()->has('mensaje'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                    <!--aqui muestra el mensaje cuando se inicia la session despues de crear la vacante de vacante creada-->
                    {{ session('mensaje') }}
                </div>
            @endif


            <livewire:mostrar-vacantes />

            
        </div>
    </div>
</x-app-layout>
