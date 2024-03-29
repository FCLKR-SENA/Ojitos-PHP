<style>
/*MODAL TEMPORAL ESTILOS*/
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.59);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        color: #fefefe;
    }

    .loading-message {
        background-color: #1a282f;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #694393;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 10px auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

/* FIN MODAL TEMPORAL*/

    .modal-buttonsc button {
        padding: 10px 20px;
        margin-right: 0px;
        cursor: pointer;
        padding: 0%;
        color: white;
        background-color:#3269c2;
        text-align: center; /* Centrar botón */
        margin-top: 20px;
    }

    #cancelBtnc {
        margin-top: 25px; /* Agregar espacio entre el texto y el botón */
        cursor: pointer;
        padding: 4%;
        color: white;
        background-color:#3269c2;
        text-align: center;
    }

    /* *****FIN MODAL***** */

    .SinfoButtonUsuario {
        background-color:    #3269c2  ;
        color: white;
        padding: 3%;
        width:100%;
    }


    .modal-container-botons{
        margin-top: 10%;
    }
    .modal-boton2{
        margin-top: 5%;
    }

    .modal-boton1{
        margin-top: 5%;

    }
    .modal-info-container {
        display: flex;
    }

    .modal-column {
        flex: 1;
        padding: 0 20px; /* Ajusta el espaciado entre las columnas según sea necesario */
    }

    .modal-column img {
        max-width: 100%;
        height: auto;
    }

    /* Estilo del modal */
    .modaldes {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
    }

    /* Estilo del contenido del modal */
    .modal-contentdes {
        background-color: #1a282f;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        height: auto;
    }

    /* Estilo del botón de cerrar */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    /* Estilo del botón de cerrar al pasar el mouse */
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .modal-info-container {
        display: flex;
        justify-content: space-between;
    }

    .modal-column {
        flex: 1;
        padding: 0 10px;
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
        background-color: rgba(0,0,0,0.9);
    }

    .probabilidad{
        font-size: 600%;
    }

    .Inf{
        font-size: 115%;
        font-weight: bold;
        margin-top: 4%;
        margin-bottom: 3.5%;
        font-family: 'Roboto Slab', serif;
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

    #confirmationModalConcluir, #confirmationModalRechazar,  #confirmationModalAprobar{
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
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

    #succesButton, #succesRButton, #succesAButton {
        background-color: #198f1b;
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap">
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
                                        <td>{{ $adopcion->probabilidad }}%</td>
                                        <td class="statusrequest">
                                            {{ $adopcion->adoption_status }}
                                            @if($adopcion->created_at != $adopcion->updated_at)
                                                <small class="text-sm text-black-600 dark:text-black-400">&middot; {{__('Actualizado')}}</small>
                                            @endif
                                            @if($adopcion->adoption_status != "Adoptado")
                                                <x-primary-button class="mt-4 flex sm:justify-center h-1/5"  onclick="openInfoModal('{{ $adopcion->id_animaladopcion }}')">  @if($adopcion->adoption_status == "En proceso") Gestionar @else Ver @endif</x-primary-button>
                                            @endif

                                            <!-- ******************MODAL PARA INFORMACIÓN***************-->
                                            <div id="infoModal{{ $adopcion->id_animaladopcion}}" class="modaldes">
                                                <div class="modal-contentdes ">
                                                    <span class="close" onclick="closeInfoModal('{{$adopcion->id_animaladopcion}}')">&times;</span>
                                                    <h2 style="font-weight: bold; margin-top: 0%">N° Registro: {{ $adopcion->id_animaladopcion }}</h2>
                                                    <div class="modal-info-container py-1.5 px-3 ">
                                                        <!-- Contenido de la información adicional del animal -->
                                                        <div class="modal-column py-2">

                                                            <img src="{{ $adopcion->animals->img }}" style="max-width: 50%; max-height: 50%;" alt="imagen" >
                                                            <h2 class="Inf">Información adicional del animal</h2>
                                                            <p>Nombre: {{ $adopcion->animals->nombreAnimaladopocion }}</p>
                                                            <p>Especie: {{$adopcion->animals->especie_Animal }}</p>
                                                            <p>Raza: {{$adopcion->animals->raza }}</p>
                                                            <p>Edad(meses): {{$adopcion->animals->age }}</p>
                                                            <p style="margin-top: 2%;">Observaciones: {{ $adopcion->animals->observacionesAnimal }}</p>

                                                            <!-- BTNS DE GESTION-->
                                                            <form id="aprobarForm{{ $adopcion->id_animaladopcion }}" action="{{route('AdopcionAdmin.aprobacion')}}" method="POST" style="display: none;">
                                                                @csrf
                                                                <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                            </form>
                                                            <div class="modal-container-buttons" style="display: flex; justify-content: space-between; margin-top: 3%; margin-right: 20%">
                                                                    <form id="rechazarForm{{ $adopcion->id_animaladopcion }}" action="{{route('AdopcionAdmin.rechazarAdopcion')}}" method="POST" style="display: none;">
                                                                        @csrf
                                                                        <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                                    </form>
                                                                    <div class="modal-boton1" style="display: flex; justify-content: left;">
                                                                    <x-secondary-button class="SinfoButton" style="background-color: #c80000; padding: 5%;" onclick="rechazarAdopcion('{{ $adopcion->id_animaladopcion }}')">
                                                                        @if($adopcion->adoption_status == "En proceso")
                                                                            Rechazar
                                                                        @else
                                                                            Cancelar Proceso
                                                                        @endif</x-secondary-button>
                                                                </div>


                                                                <!--*****Aprobacion de adopcion******-->
                                                                <form id="aprobarForm{{ $adopcion->id_animaladopcion }}" action="{{route('AdopcionAdmin.aprobacion')}}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                                </form>

                                                                    @if($adopcion->adoption_status == "P. Entrega")
                                                                        <form id="concluirForm{{ $adopcion->id_animaladopcion }}" action="{{route('AdopcionAdmin.conclusionAdopcion')}}" method="POST" style="display: none;">
                                                                            @csrf
                                                                            <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                                        </form>
                                                                        <div class="modal-boton2" style="display: flex; justify-content: right;">
                                                                            <x-primary-button class="SadoptarButton" onclick="concluirAdopcion('{{ $adopcion->id_animaladopcion }}')">Terminar</x-primary-button>
                                                                        </div>

                                                                    @elseif($adopcion->adoption_status != "P. Vacuna")
                                                                        <div class="modal-boton2" style="display: flex; justify-content: right;">
                                                                            <x-primary-button class="SadoptarButton" onclick="aprobacionAdopcion('{{ $adopcion->id_animaladopcion }}')">Aprobar</x-primary-button>
                                                                        </div>
                                                                    @endif
                                                                    <!-----Fin aprobacion------->
                                                                <!-----Fin aprobacion------->

                                                            </div>
                                                            <!-- FIN BOTONES DE GESTION------------------------------->
                                                        </div>

                                                        <div class="modal-column ">
                                                            <h6 style="font-weight: bold; font-size: 80%; margin-bottom: 1%; font-style: italic">Probabilidad de adopcion: </h6>
                                                            <h2 class="probabilidad"
                                                                @if($adopcion->probabilidad <40) style="color: #c80000; text-align: center"
                                                                @elseif($adopcion->probabilidad >39 && $adopcion->probabilidad<60) style="color: #d39e00; text-align: center"
                                                                @elseif($adopcion->probabilidad >59 && $adopcion->probabilidad<80)style="color: #28a745;text-align: center"
                                                                @elseif($adopcion->probabilidad >59 && $adopcion->probabilidad<101)style="color: #007bff;text-align: center"
                                                                @endif>{{$adopcion->probabilidad}}%</h2>
                                                            <h2 class="Inf">Información adicional del solicitante</h2>
                                                            <p>Nombre: {{ $adopcion->users->name}} {{$adopcion->users->lastname}}</p>
                                                            <p>Identificacion: {{ $adopcion->users->document}}</p>
                                                            <p>Edad: {{$adopcion->users->age }} años</p>
                                                            <p>E-mail: {{$adopcion->users->email }}</p>
                                                            <p>Se unio a Ojitos: {{$adopcion->users->created_at }}</p>
                                                            <p style="margin-top: 2%;">Motivo de adopcion: {{ $adopcion->motivo }}</p>

                                                            <div class="modal-boton1">
                                                                <a href="{{ route('admin.descargar-documento', ['userDocument' => $adopcion->id_animaladopcion]) }}">
                                                                    <button class="SinfoButtonUsuario">Ver documento</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- *************FIN DEL MODAL PARA INFORMACIÓN*************** -->
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

    <!---MODAL TEMPORAL POR PROCESO-->
    <div id="loadingOverlay" class="loading-overlay" style="display: none;">
        <div class="loading-message">
            <p>Procesando actualizacion...</p>
            <div class="spinner"></div>
        </div>
    </div>
    <!---FINAL MODAL TEMPORAL-->

    <!-- Modal Confirmacion correo -->
    <div id="myModalc" class="modalc">
        <!-- <span class="closec">&times;</span> -> "X" para cierre de la ventana-->
        <div class="modal-contentc py-12">
            <p class="confirdesc">Estamos enviando informacion a tu correo...</p>
            <!-- <div class="modal-buttonsc">
                 <button id="cancelBtnc">Aceptar</button>
                 Puedes agregar aquí un botón para realizar alguna acción adicional
             </div>-->
        </div>
    </div>


    <!--*******************************************-->
    <!-- Cuadro de confirmación TERMINAR PROCESO-->
    <div id="confirmationModalConcluir" style="display: none">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Han recogido al Animal?</p>
            <button id="succesButton" >Confirmar</button>
            <button id="cancelButton" onclick="closeConfirmationCon()">Cancelar</button>
        </div>
    </div>
    <!----FIN CUADRO DE CONFIRMACION--->
    <!--***********************************************-->

    <!--*******************************************-->
    <!-- Cuadro de confirmación RECHAZAR PROCESO-->
    <div id="confirmationModalRechazar" style="display: none">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Seguro de rechazar el proceso?</p>
            <button id="succesRButton" >Confirmar</button>
            <button id="cancelButton" onclick="closeConfirmationRez()">Cancelar</button>
        </div>
    </div>
    <!----FIN CUADRO DE CONFIRMACION RECHAZO--->
    <!--***********************************************-->

    <!--*******************************************-->
    <!-- Cuadro de confirmación APROBAR PROCESO-->
    <div id="confirmationModalAprobar" style="display: none">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Desea dar continuidad?</p>
            <button id="succesAButton" >Confirmar</button>
            <button id="cancelButton" onclick="closeConfirmationApr()">Cancelar</button>
        </div>
    </div>
    <!----FIN CUADRO DE CONFIRMACION APRBACION--->
    <!--***********************************************-->

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



    <script>
        //**MODAL TEMPORAL ENTRE PROCESOS
        function showLoading() {
            document.getElementById("loadingOverlay").style.display = "flex";
            document.getElementById("confirmationModalConcluir").style.display = "none";


            // Simular un proceso que tarda 3 segundos
            setTimeout(function() {
                document.getElementById("loadingOverlay").style.display = "none";
            }, 10000);
        }

        //**FIN DE MODAL TEMPORAL

        //*****Aprobacion de adopcion******
        function aprobarAdopcion(adopcionId) {
            document.getElementById('aprobarForm' + adopcionId).submit();
        }
        //****FIN APROBACION**********


        //*****APROBACION de adopcion******
        function confirmActionApr(formId) {
            // Submit the form associated with the provided ID
            document.getElementById(formId).submit();
        }
        function aprobacionAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'aprobarForm' + adopcionId;
            // Mostramos el modal de confirmación

            document.getElementById('infoModal' + adopcionId).style.display = 'none';
            document.getElementById('confirmationModalAprobar').style.display = 'block';
            // Asignamos un event listener al botón de confirmar dentro del modal
            // Cuando se hace clic en el botón de confirmar, se activa la función confirmActionCon(formId) para enviar el formulario asociado con formId
            document.getElementById('succesAButton').onclick = function() {
                confirmActionRez(formId);
            };
        }
        function closeConfirmationApr() {
            document.getElementById('confirmationModalAprobar').style.display = 'none';
        }
        //****FIN APROBACION adopcion**********


        //*****RECHAZO de adopcion******
        function confirmActionRez(formId) {
            // Submit the form associated with the provided ID
            document.getElementById(formId).submit();
        }
        function rechazarAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'rechazarForm' + adopcionId;
            // Mostramos el modal de confirmación

            document.getElementById('infoModal' + adopcionId).style.display = 'none';
            document.getElementById('confirmationModalRechazar').style.display = 'block';
            // Asignamos un event listener al botón de confirmar dentro del modal
            // Cuando se hace clic en el botón de confirmar, se activa la función confirmActionCon(formId) para enviar el formulario asociado con formId
            document.getElementById('succesRButton').onclick = function() {
                confirmActionRez(formId)
                showLoading();
            };
        }
        function closeConfirmationRez() {
            document.getElementById('confirmationModalRechazar').style.display = 'none';
        }
        //****FIN RECHAZADOadopcion**********


        //*****concluision de adopcion******
        function confirmActionCon(formId) {
            // Submit the form associated with the provided ID
            document.getElementById(formId).submit();
        }
        function concluirAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'concluirForm' + adopcionId;
            // Mostramos el modal de confirmación

            document.getElementById('infoModal' + adopcionId).style.display = 'none';
            document.getElementById('confirmationModalConcluir').style.display = 'block';
            // Asignamos un event listener al botón de confirmar dentro del modal
            // Cuando se hace clic en el botón de confirmar, se activa la función confirmActionCon(formId) para enviar el formulario asociado con formId
            document.getElementById('succesButton').onclick = function() {
                confirmActionCon(formId);
            };
        }
        function closeConfirmationCon() {
            document.getElementById('confirmationModalConcluir').style.display = 'none';
        }
        //****FIN conclusion adopcion**********

        function enviarCorreo(animalId) {
            var form = document.getElementById('emailForm' + animalId);
            form.submit();
            openModalc()
            console.log()
        }

        //***************MODAL CONFIRMACION ENVIO DE CORREO******

        // Obtener elementos del DOM
        var modal = document.getElementById('myModalc');
        var openModalBtn = document.getElementById('openModalBtnc');
        var closeModalBtn = document.getElementsByClassName('closec')[0];
        var cancelBtn = document.getElementById('cancelBtnc');

        // Función para abrir el modal
        function openModalc() {
            modal.style.display = 'block';
        }

        /* Función para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }*/

        // Función para cerrar el modal al hacer click en la X
        closeModalBtn.onclick = function() {
            modal.style.display = 'none';
        }

        // Función para cerrar el modal al hacer click en el botón de cancelar
        cancelBtn.onclick = function() {
            modal.style.display = 'none';
        }

        // Función para cerrar el modal al hacer click fuera de él
        /*window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }*/

        //*******FIN MODAL******************************
        function openInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "block";
        }

        function closeInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "none";
        }
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
                    const cells = rows[i].getElementsByTagName('td');
                    let found = false;

                    for (let j = 0; j < cells.length; j++) {
                        const cellValue = cells[j].textContent.toLowerCase();
                        if (cellValue.includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }

                    rows[i].style.display = found ? '' : 'none';
                }
            });
        });
    </script>

</x-app-layout>
