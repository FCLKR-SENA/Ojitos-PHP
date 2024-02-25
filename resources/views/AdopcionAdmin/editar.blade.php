<style>
    #confirmationModal {
    display: none;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.93);
    }

    #confirmationBox {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #1c2c34 ;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    }

    #confirmationBox h2{
    margin-top: 0;
    }

    #confirmationBox button {
    margin: 10px;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    #confirmButton {
    background-color: green;
    color: white;
    }

    #cancelButton {
    background-color: red;
    color: white;
    }

    .con {
    color: #ffffff;
    }

    .parcon{
    color: #ffffff;
    }
</style>

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

                    <form method="POST" action="{{route('Animals.update' , $animal)}}" id="miFormulario" onsubmit="return validarFormulario()" enctype="multipart/form-data">
                        @csrf @method('PUT')
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

                        <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                            <div class="container relative">
                                <div class="flex sm:justify-between h-8">
                                    <!--Imagen-->
                                    <div class="mt-3">
                                        <x-input-label for="img" :value="__('Subir Imgen del animal')" />
                                        <input id="img" class="block mt-1 w-full" type="file" name="img" />
                                        <!--<x-input-error :messages="$errors->get('observacionesAnimal')" class="mt-2" />-->
                                    </div>
                                    <x-primary-button class="mt-4 flex sm:justify-center h-8" >Actualizar Registro</x-primary-button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Cuadro de confirmación Actualizacion -->
    <div id="confirmationModal">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Estás seguro de realizar el registro?</p>
            <x-primary-button onclick="confirmAction()" class="mt-4 flex sm:justify-center h-8" >Confirmar</x-primary-button>
            <!--<button id="confirmButton" onclick="confirmAction()">Confirmar</button>-->
            <button id="cancelButton" onclick="closeConfirmation()">Cancelar</button>
        </div>
    </div>

    <script>
        function validarFormulario() {
            // Validar los campos del formulario
            // Por ejemplo, puedes verificar si los campos están llenos
            // Si los campos no están llenos, muestra un mensaje de error y devuelve false
            if (!document.getElementById('fechaEncuentro').value || !document.getElementById('especie_Animal').value || !document.getElementById('nombreAnimaladopocion').value || !document.getElementById('raza').value || !document.getElementById('observacionesAnimal').value) {
                alert("Por favor, complete todos los campos.");
                return false;
            }
            openConfirmation(document.getElementById('miFormulario'));
            // Devuelve false para evitar que el formulario se envíe automáticamente
            return false;
        }
        var formToSubmit
        // Función para mostrar el cuadro de confirmación y almacenar el formulario
        function openConfirmation(form) {
            formToSubmit = form; // Almacenar el formulario
            document.getElementById('confirmationModal').style.display = 'block';
        }

        // Función para cerrar el cuadro de confirmación
        function closeConfirmation() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        // Función para confirmar la acción y enviar el formulario
        function confirmAction() {
            // Aquí puedes agregar la lógica para realizar el registro
            formToSubmit.submit(); // Enviar el formulario almacenado
            // Cerrar el cuadro de confirmación después de confirmar la acción
            closeConfirmation();
        }

    </script>
</x-app-layout>
