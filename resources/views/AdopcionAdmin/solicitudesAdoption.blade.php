<style>
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
        background-color: rgba(0,0,0,0.9);
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
    .obs{
        width: 8%;
    }
    .esp{
        width: 3%;
    }
    th {
        background-color:  #0056b3 ; /* Fondo gris oscuro para los títulos */
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
    .statusrequest{
        font-size: 90%;
        text-align: left;
    }
    .fecha{
        font-size: 70%;
        text-align: center;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion Adopcion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                        <div class="container relative">
                            <div class="flex sm:justify-between h-8">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Solcitudes de Adopcion') }}
                                </h2>
                                <x-primary-button class="flex sm:justify-between h-8" id="toggleButton">Ocultar Tabla</x-primary-button>
                                <x-text-input id="buscar" type="text" placeholder="Buscar..." class="hidden sm:flex sm:items-right sm:ml-3"></x-text-input>
                            </div>
                        </div>

                        <div id="tableContainer" style="display: block;">
                            <table id="dataTable">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th class="obs">Fecha solicitud</th>
                                    <th class="esp">Especie</th>
                                    <th>Raza</th>
                                    <th>Edad (Meses)</th>
                                    <th>Requerido por:</th>
                                    <th># Documento</th>
                                    <th>Probabilidad</th>
                                    <th>Estado Solicitud</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($adopciones as $adopcion)
                                    <tr>
                                        <td>
                                            @if($adopcion->animals->img)
                                                <img src="{{ asset($adopcion->animals->img) }}" style="max-width: 80px; max-height: 80px;" alt="imagen" onclick="openModal('{{ asset($adopcion->animals->img) }}')">
                                            @else
                                                No hay imagen
                                            @endif
                                        </td>
                                        <td>{{ $adopcion->animals->nombreAnimaladopocion}}</td>
                                        <td class="fecha">{{ $adopcion->created_at }}</td>
                                        <td>{{ $adopcion->animals->especie_Animal }}</td>
                                        <td>{{ $adopcion->animals->raza }}</td>
                                        <td>{{ $adopcion->animals->age}}</td>
                                        <td>{{ $adopcion->users->name }}</td>
                                        <td>{{ $adopcion->users->document }}</td>
                                        <td>{{ $adopcion->probabilidad }}</td>
                                        <td class="statusrequest">
                                            {{ $adopcion->adoption_status }}
                                            @if($adopcion->created_at != $adopcion->updated_at)
                                                <small class="text-sm text-black-600 dark:text-black-400">&middot; {{__('Actualizado')}}</small>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
            <x-primary-button onclick="confirmAction()" class="mt-4 flex sm:justify-center h-8">Confirmar</x-primary-button>
            <button id="cancelButton" onclick="closeConfirmation()">Cancelar</button>
        </div>
    </div>

    <!-- Cuadro de confirmación Eliminar-->
    <div id="confirmationModalDelete">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Estás seguro deseas eliminar?</p>
            <x-primary-button onclick="confirmActionDel()" class="mt-4 flex sm:justify-center h-8">Confirmar</x-primary-button>
            <button id="cancelButton" onclick="closeConfirmationDel()">Cancelar</button>
        </div>
    </div>

    <script>
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

        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('toggleButton');
            const searchInput = document.getElementById('buscar');
            const dataTable = document.getElementById('dataTable');

            toggleButton.addEventListener('click', function () {
                if (dataTable.style.display === 'none') {
                    dataTable.style.display = '';
                    this.textContent = "Ocultar Tabla";
                } else {
                    dataTable.style.display = 'none';
                    this.textContent = "Mostrar Tabla";
                }
            });

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const rows = dataTable.getElementsByTagName('tr');

                for (let i = 1; i < rows.length; i++) {
                    let found = false;
                    const cells = rows[i].getElementsByTagName('td');

                    for (let j = 0; j < cells.length; j++) {
                        const cellValue = cells[j].textContent.toLowerCase();
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
