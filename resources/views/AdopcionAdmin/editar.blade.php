<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--{{ __("You're logged in!") }}-->

                    <form method="POST" action="{{route('AdopcionAdmin.index')}}">
                        @csrf
                        <!--Fecha de encuentro-->
                        <div class="mt-3">
                            <x-input-label for="fechaEncuentro" :value="__('¿Cuando se encontro')" />
                            <x-text-input id="fechaEncuentro" class="block mt-1 w-full" type="date" name="fechaEncuentro" :value="old('fechaEncuentro',$animal->fechaEncuentro)" required autofocus autocomplete="fechaEncuentro" />
                            <x-input-error :messages="$errors->get('fechaEncuentro')" class="mt-2" />
                        </div>

                        <!--Especie-->
                        <div class="mt-3">
                            <x-input-label for="especie_Animal" :value="__('Especifique la especie')" />
                            <x-text-input id="especie_Animal" class="block mt-1 w-full" type="text" name="especie_Animal" :value="old('especie_Animal',$animal->especie_Animal)" required autofocus autocomplete="especie_Animal" />
                            <x-input-error :messages="$errors->get('especie_Animal')" class="mt-2" />
                        </div>

                        <!--Nombre asignado-->
                        <div class="mt-3">
                            <x-input-label for="nombreAnimaladopocion" :value="__('Nombre asignado')" />
                            <x-text-input id="nombreAnimaladopocion" class="block mt-1 w-full" type="text" name="nombreAnimaladopocion" :value="old('nombreAnimaladopocion',$animal->nombreAnimaladopocion)" required autofocus autocomplete="nombreAnimaladopocion" />
                            <x-input-error :messages="$errors->get('nombreAnimaladopocion')" class="mt-2" />
                        </div>

                        <!--Raza-->
                        <div class="mt-3">
                            <x-input-label for="raza" :value="__('cual es la raza')" />
                            <x-text-input id="raza" class="block mt-1 w-full" type="text" name="raza" :value="old('raza',$animal->raza)" required autofocus autocomplete="raza" />
                            <x-input-error :messages="$errors->get('raza')" class="mt-2" />
                        </div>

                        <!--Observaciones-->
                        <div class="mt-3">
                            <x-input-label for="observacionesAnimal" :value="__('Que observaciones')" />
                            <x-text-input id="observacionesAnimal" class="block mt-1 w-full" type="text" name="observacionesAnimal" :value="old('observacionesAnimal',$animal->observacionesAnimal)" required autofocus autocomplete="observacionesAnimal" />
                            <x-input-error :messages="$errors->get('observacionesAnimal')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-4 flex sm:justify-center h-8" >Actualizar Registro</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
