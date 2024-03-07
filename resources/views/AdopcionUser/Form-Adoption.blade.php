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
        <h3 class="font-semibold text-xs text-gray-800 dark:text-gray-200 leading-tight">Si deseas cancelar la solicitud, haz click en la pestaña "¡Adopta!"</h3>
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

                                <!-- Pregunta 11-->
                                <div class="mt-3 select-container oculto">
                                    <x-input-label for="p11" :value="__('Finalmente cuentanos tu razon para adoptar')" />
                                    <x-text-input id="p11" class="block mt-1 w-full" type="text" name="motivo" required autofocus autocomplete="p11" />
                                </div>

                                <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                                    <div class="container relative">
                                        <div class="flex sm:justify-between h-8">
                                            <x-primary-button class="mt-4 flex sm:justify-center h-8" id="openModal">Enviar solicitud</x-primary-button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                </div>
            </div> <!-- CIERRE DEL CONTAINER-->

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
    //SCRIPT CONFIRMACION DE ENVIO
    function validarFormulario() {
        // Validar los campos del formulario
        // Por ejemplo, puedes verificar si los campos están llenos
        // Si los campos no están llenos, muestra un mensaje de error y devuelve false
        if (!document.getElementById('p1').value
            || !document.getElementById('p2').value
            || !document.getElementById('p3').value
            || !document.getElementById('p4').value
            || !document.getElementById('p5').value
            || !document.getElementById('p6').value
            || !document.getElementById('p7').value
            || !document.getElementById('p8').value
            || !document.getElementById('p9').value
            || !document.getElementById('p10').value
            || !document.getElementById('p11').value) {
            alert("Por favor, complete todos los campos.");
            return false;
        }
        openConfirmation(document.getElementById('FormAdopcion'));
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
    //**********FIN DE SCRIPT CONFIRMACION DE ENVIO*******************

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
