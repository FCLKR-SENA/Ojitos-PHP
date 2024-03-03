<style>
    .oculto {
        display: none;
    }
    /* Estilos para el contenedor */
    .select-container {
        background: linear-gradient(to bottom, #2c3e50, #34495e); /* Fondo entre azul y gris oscuro */
        border: 2px solid #9b59b6; /* Borde morado */
        border-radius: 5px; /* Borde redondeado */
        padding: 10px; /* Espacio interno */
        width: 100%; /* Ancho completo */
    }

    /* Estilos para el select */
    .select-container select {
        width: 100%; /* Ancho completo */
        padding: 8px; /* Espacio interno */
        border: none; /* Sin borde */
        outline: none; /* Sin contorno */
        background: none; /* Fondo transparente */
        color: white; /* Color del texto */
        appearance: none; /* Eliminar apariencia nativa del select */
        cursor: pointer; /* Cursor de selección */
    }

    /* Estilos para las opciones del select */
    .select-container select option {
        background: #34495e; /* Fondo */
        color: white; /* Color del texto */
    }
</style>

@php
    // Obtener el ID del animal de la URL
    $animalId = request()->query('animal_id');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Diligencia el formulario') }}
        </h2>
    </x-slot>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--{{ __("You're logged in!") }}-->

                        <div id="formContainer" style="display: block;">
                            <form method="POST" action="{{route('Probabilidad')}}"  id="FormAdopcion" onsubmit="return validarFormulario()" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="animal_id" value="{{ $animalId }}">



                                <!-- Pregunta 1-->
                                <div class="mt-3 select-container">
                                    <x-input-label for="p1" :value="__('1. ¿Estás interesado en adoptar un animal en lugar de comprar uno?')" />
                                    <select id="p1" class="block mt-1" name="p1">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="noe">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 2-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p2" :value="__('2. ¿Tienes preferencia por el tipo de animal que te gustaría adoptar?')" />
                                    <select id="p2" class="block mt-1" name="p2">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 3-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p3" :value="__('3. ¿Estás dispuesto/a a proporcionar cuidados veterinarios, incluyendo vacunas y chequeos regulares?')" />
                                    <select id="p3" class="block mt-1" name="p3">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 4-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p4" :value="__('4. ¿Tienes suficiente espacio en tu hogar para el animal?')" />
                                    <select id="p4" class="block mt-1" name="p4">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 5-->
                                <div class="mt-3 select-container oculto    ">
                                    <x-input-label for="p5" :value="__('5. ¿Hay restricciones en tu hogar o comunidad en cuanto a tener mascotas?')" />
                                    <select id="p5" class="block mt-1" name="p5">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 6-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p6" :value="__('6. ¿Tienes experiencia previa en cuidar y entrenar animales?')" />
                                    <select id="p6" class="block mt-1" name="p6">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 7-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p7" :value="__('7. ¿Estás dispuesto/a a proporcionar ejercicio y estimulación mental para el animal?')" />
                                    <select id="p7" class="block mt-1" name="p7">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 8-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p8" :value="__('8. ¿Estarás tú o alguien más dispuesto/a a ser el principal responsable de cuidar al animal?')" />
                                    <select id="p8" class="block mt-1" name="p8">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 9-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p9" :value="__('9. ¿Tienes niños en casa? ¿Están acostumbrados a convivir con animales?')" />
                                    <select id="p9" class="block mt-1" name="p9">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
                                </div>

                                <!-- Pregunta 10-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p10" :value="__('10. ¿Estás dispuesto/a a comprometerte a cuidar al animal durante toda su vida?')" />
                                    <select id="p10" class="block mt-1" name="p10">
                                        <option value="">Selecciona una opción</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                        <option value="no">No estoy seguro</option>
                                    </select>
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
                                            <x-primary-button class="mt-4 flex sm:justify-center h-8" >Ingresar Animal</x-primary-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div> <!-- CIERRE DEL CONTAINER-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const formulario = document.getElementById('FormAdopcion');
        const preguntas = document.querySelectorAll('.select-container');

        formulario.addEventListener('change', function(event) {
            const preguntaActual = event.target.closest('.select-container');
            const siguientePregunta = preguntaActual.nextElementSibling;

            // Si hay una siguiente pregunta y el valor de la respuesta actual no está vacío
            if (siguientePregunta && event.target.value.trim() !== '') {
                siguientePregunta.classList.remove('oculto');
            }
        });
    });

</script>

</x-app-layout>
