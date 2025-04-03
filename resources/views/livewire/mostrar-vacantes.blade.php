<div>

    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">

        <!--si hay mas de cero vacante se ejecuta este codigo-->
        <!--se va a utilizar la neuva funcion de laravel forelse que solo exite en laravel que se utiliza con empty que es como un if con foreaach para itere y tome la decision dependiendo-->
        {{-- @if (count($vacantes) > 0) --}}


        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900  md:flex md:justify-between md:items-center">

                <div class="space-y-3">

                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold text-gray-600 hover:text-indigo-600">
                        {{ $vacante->titulo }}
                    </a>

                    <p class="text-sm  text-gray-600 font-bold">{{ $vacante->empresa }}</p>

                    <!--format esta formateando la fecha para ponerla en este orden d/m/y y mutandola en la abase de datos-->
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>

                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">

                    <a href="{{ route('candidatos.index', $vacante->id) }}"
                        class="bg-slate-800 hover:bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center "
                    >
                        {{ $vacante->candidatos()->count() }}
                        Candidatos
                    </a>

                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 hover:bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center ">Editar</a>

                    <!--este es un evento de livewire para eliminar unaa vacante mediante un evento-->
                    <button wire:click="eliminarVacante({{ $vacante->id }})"
                        class="bg-red-600 hover:bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center ">Eliminar</button>

                </div>

            </div>


            <!-- empty esto es como el else del if que si no detecta nada tiene el empty-->
        @empty

            <p class="p-3 text-sm text-center text-gray-600">No hay vacante</p>
        @endforelse

    </div>

    <!--como estamos iterando sobre vacante tenemos acceso a la paginacion-->
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>

</div>

@push('scripts')
    <!--aqui pongo todoo el sript que quiero que se aplique a livewire en laa pagina principal que es app.blade para que funcione la alerta de sweetalert-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
