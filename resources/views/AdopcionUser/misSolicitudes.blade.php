<style>

    .custom-button {
        background-color: #F1883A;
        color: #FFFFFF; /* Letra clara para mayor legibilidad */
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 17px;
        cursor: pointer;
        margin-top: 12%;
        font-style: normal;
        font-weight: bold;
    }

    .custom-button:hover {
        background-color: #D36C08; /* Cambio de color al pasar el ratón */
    }


    /* Estilos para el contenedor */
    .select-container {
        background: linear-gradient(to bottom, #202838, #202838); /* Fondo entre azul y gris oscuro */
        border: 2px solid #4e56ee; /* Borde morado */
        border-radius: 5px; /* Borde redondeado */
        padding: 6px; /* Espacio interno */
        width: 40%; /* Ancho completo */
    }

    /* Estilos para el select */
    .select-container select {
        width: 100%; /* Ancho completo */
        padding: 6px; /* Espacio interno */
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

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 80%;
        max-height: 80%;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    #confirmationModalDelete {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.93);
    }

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
        background-color: #1c2c34;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    #confirmationBox h2 {
        margin-top: 0;
    }

    #confirmationBox button {
        margin: 10px;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #cancelButton {
        background-color: red;
        color: white;
    }

    .con {
        color: #ffffff;
    }

    .parcon {
        color: #ffffff;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;

    }

    th, td {
        border: 1px solid #000; /* Borde de columnas */
        padding: 8px;
        width: 4%;
        text-align: center;
        color: #ffffff; /* Letra blanca */
        background-color: #062c33;
    }

    .obs {
        width: 15%;
    }

    .esp {
        width: 3%;
    }

    th {
        background-color: #644494; /* Fondo gris oscuro para los títulos */
        font-weight: bold; /* Títulos en negrilla */
        color: #ffffff;
    }

    td:nth-child(4), /* Columna de "Creado en" */
    td:nth-child(5) { /* Columna de "Actualizado en" */
        width: 120px; /* Columnas más estrechas */

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }


    }

    .updated_at {
        font-size: 70%;
        text-align: left;
    }

    .fecha {
        font-size: 70%;
        text-align: center;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido ')}} {{Auth::user()->name}} {{ __('a este, tu espacio de solicitudes.')}}
        </h2>
    </x-slot>

    <div class="py-3">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-8 lg:px-12">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                            <div class="container relative">
                                <div class="flex sm:justify-between h-8">
                                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                        @if(count($misSolicitudes) > 0){{ __('¡Tus solicitudes!') }}@else {{ __('¡Aqui apareceran la solicitudes de adopcion que realices!') }}@endif
                                    </h2>
                                </div>
                            </div>
                            @if(count($misSolicitudes) > 0)
                            <div id="tableContainer" style="display: block;">
                                <table id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Fecha de solicitud</th>
                                        <th class="esp">Especie</th>
                                        <th>Raza</th>
                                        <th>Edad (Meses)</th>
                                        <th class="obs">Observaciones</th>
                                        <th>Estado Solicitud</th>
                                        <!--<th>Accion</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($misSolicitudes as $misSolicitud)
                                        <tr>
                                            <td> @if($misSolicitud->animals->img)
                                                    <img src="{{ asset($misSolicitud->animals->img) }}"
                                                         style="max-width: 80px; max-height: 80px;" alt="imagen"
                                                         onclick="openModal('{{ asset($misSolicitud->animals->img) }}')">
                                                @else
                                                    No hay imagen
                                                @endif
                                            </td>
                                            <td> {{ $misSolicitud->animals->nombreAnimaladopocion}}</td>
                                            <td class="fecha">{{ $misSolicitud->created_at }}</td>
                                            <td>{{ $misSolicitud->animals->especie_Animal }}</td>
                                            <td>{{ $misSolicitud->animals->raza }}</td>
                                            <td>{{ $misSolicitud->animals->age}}</td>
                                            <td>{{ $misSolicitud->animals->observacionesAnimal }}</td>
                                            <td>@if($misSolicitud->adoption_status == 'P. Vacuna')
                                                    <p>Haz click y obten la vacuna</p>
                                                    <button class="custom-button">Obtener</button>
                                                @elseif($misSolicitud->adoption_status == 'P. Entrega')
                                                    <p>¡Ya puedes ir por tu amigo de 4 patas!</p>
                                                @elseif($misSolicitud->adoption_status == 'En proceso')
                                                    <p>¡Estamos evaluando tu solicitud...!</p>
                                                @else
                                                    <p>¡Es tuyo!</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--MODAL PARA IMAGEN-->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content" src="" alt="imagen">
    </div>

    <!-- Cuadro de confirmación Registro -->
    <div id="confirmationModal">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Estás seguro de realizar el registro?</p>
            <x-primary-button onclick="confirmAction()" class="mt-4 flex sm:justify-center h-8">Confirmar
            </x-primary-button>
            <!--<button id="confirmButton" onclick="confirmAction()">Confirmar</button>-->
            <button id="cancelButton" onclick="closeConfirmation()">Cancelar</button>
        </div>
    </div>

    <!-- Cuadro de confirmación Eliminar-->
    <div id="confirmationModalDelete">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Estás seguro deseas eliminar?</p>
            <x-primary-button onclick="confirmActionDel()" class="mt-4 flex sm:justify-center h-8">Confirmar
            </x-primary-button>
            <!--<button id="confirmButton" onclick="confirmAction()">Confirmar</button>-->
            <button id="cancelButton" onclick="closeConfirmationDel()">Cancelar</button>
        </div>
    </div>


    <script>
        //Generar checkbox dependiendo del SELECT
        document.getElementById('especie_Animal').addEventListener('change', function () {
            var especie_Animal = this.value;
            var opcionesPerro = document.getElementById('opcionesPerro');
            var opcionesGato = document.getElementById('opcionesGato');

            if (especie_Animal === 'Perro') {
                opcionesPerro.style.display = 'block';
                opcionesGato.style.display = 'none';
            } else if (especie_Animal === 'Gato') {
                opcionesPerro.style.display = 'none';
                opcionesGato.style.display = 'block';
            } else {
                opcionesPerro.style.display = 'none';
                opcionesGato.style.display = 'none';
            }
        });

        //FIN DEL CHECKBOX DEPENDIENTE DEL SELECT


        function openModal(imageSrc) {
            var modal = document.getElementById('imageModal');
            var modalImg = document.getElementById('modalImage');
            modal.style.display = "block";
            modalImg.src = imageSrc;
        }

        function closeModal() {
            var modal = document.getElementById('imageModal');
            modal.style.display = "none";
        }

        // Obtener el campo de fecha
        var fechaEncuentroInput = document.getElementById('fechaEncuentro');

        // Obtener la fecha actual
        var fechaActual = new Date().toISOString().split('T')[0];

        // Asignar la fecha actual al campo de fecha
        fechaEncuentroInput.value = fechaActual;

        var urlToDelete; // Variable global para almacenar la URL de eliminación

        // Función para mostrar el cuadro de confirmación de eliminación
        function openConfirmationDel(url) {
            urlToDelete = url; // Almacenar la URL de eliminación
            document.getElementById('confirmationModalDelete').style.display = 'block';
        }

        // Función para confirmar la eliminación
        function confirmActionDel() {
            // Enviar una solicitud de eliminación al servidor
            fetch(urlToDelete, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegúrate de enviar el token CSRF si lo estás utilizando
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    if (response.ok) {
                        //window.location.reload(); ->Vuelve a cargar la pagina.
                    } else {
                        // Ocurrió un error durante la eliminación
                        // Aquí puedes manejar el error como desees
                    }
                })
                .catch(error => {
                    console.error('Error al eliminar el animal:', error);
                })
                .finally(() => {
                    // Cerrar el cuadro de confirmación después de confirmar la acción
                    closeConfirmationDel();
                    window.location.href = '{{ route('AdopcionAdmin.index') }}';
                });
        }

        // Función para cerrar el cuadro de confirmación
        function closeConfirmationDel() {
            document.getElementById('confirmationModalDelete').style.display = 'none';
        }

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

        document.getElementById("toggleFormButton").addEventListener("click", function () {
            var formContainer = document.getElementById("formContainer");
            if (formContainer.style.display === "none") {
                formContainer.style.display = "block";
                this.textContent = "Cancelar registro";
            } else {
                formContainer.style.display = "none";
                this.textContent = "Registrar";
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('toggleButton');
            const searchInput = document.getElementById('searchInput');
            const dataTable = document.getElementById('dataTable');
            const rows = dataTable.getElementsByTagName('tr');

            toggleButton.addEventListener('click', function () {
                if (tableContainer.style.display === 'none') {
                    tableContainer.style.display = '';
                    this.textContent = "Ocultar Tabla";
                } else {
                    tableContainer.style.display = 'none';
                    this.textContent = "Mostrar Tabla";
                }
            });

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();

                for (let i = 1; i < rows.length; i++) { // Empezamos desde 1 para ignorar el encabezado
                    let found = false;

                    for (let j = 0; j < rows[i].cells.length; j++) {
                        const cellValue = rows[i].cells[j].textContent.toLowerCase();
                        if (cellValue.includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }

                    if (found) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>

</x-app-layout>
