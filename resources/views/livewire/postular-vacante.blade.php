<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">

    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    <!--si esta activa la session mostrara un mensaje cuando te postules-->
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            <!--aqui muestra el mensaje cuando se inicia la session despues de crear la vacante de vacante creada-->
            {{ session('mensaje') }}
        </div>
    @else
        <!--cuando se postula se ejecuta la funcion postularme para guarda esos datos-->
        <form wire:submit.prevent="postularme" class="w-96 mt-5">

            <div class="mb-4">

                <x-input-label for="cv" :value="__('curriculum (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" />

                @error('cv')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror

            </div>

            <!--a este bootton se le pasa la informacion mediante unslot que utiliza y recibe la informacion que escribo abajo-->
            <x-primary-button class="my-5">
                {{ __('Postularme') }}
            </x-primary-button>

        </form>
    @endif


</div>
