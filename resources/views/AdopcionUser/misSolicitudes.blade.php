<style>
    #succesButton {
        background-color: #198f1b;
        color: white;
    }
    /* Estilos para el contenedor */
    .select-container {
        background: linear-gradient(to bottom, #202838, #202838); /* Fondo entre azul y gris oscuro */
        border: 2px solid #4e56ee; /* Borde morado */
        border-radius: 5px; /* Borde redondeado */
        padding: 6px; /* Espacio interno */
        width: 100%; /* Ancho completo */
        margin-top: 5%;
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

    /* MODAL CONFIRMACION ENVIO*/

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


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

    /* *****FIN MODAL***** */

    .SinfoButton {
        background-color:    #3269c2  ;
        color: white;
        padding: 6%;

    }
    .SadoptarButton {
        background-color:   #694393 ;
        color: white;
        padding: 4%;

    }
    .modal-container-botons{
        margin-top: 10%;
    }
    .modal-boton2{
        margin-top: 5%;
        text-align: right;
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
        margin: 15% auto;
        padding: 10px;
        border: 1px solid #888;
        width: 50%;
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
    .fecha{
        margin-bottom: 2%;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Separación entre las imágenes */
    }


    .item img {
        max-width: 100%;
        height: auto;
    }

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

    #confirmationModalConcluir{
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
                                                    <button id="openModalBtnc" class="custom-button" onclick="openInfoModal('{{ $misSolicitud->animals->id }}')">Obtener</button>
                                                @elseif($misSolicitud->adoption_status == 'P. Entrega')
                                                    <p>¡Ya puedes ir por tu amigo de 4 patas!</p>
                                                @elseif($misSolicitud->adoption_status == 'En proceso')
                                                    <p>¡Estamos evaluando tu solicitud...!</p>
                                                @else
                                                    <p>¡Es tuyo!</p>
                                                @endif
                                            </td>

                                            <!-- ******************MODAL PARA INFORMACIÓN*************** -->

                                            <div id="infoModal{{ $misSolicitud->animals->id }}" class="modaldes">
                                                <div class="modal-contentdes">
                                                    <span class="close" onclick="closeInfoModal('{{ $misSolicitud->animals->id }}')">&times;</span>
                                                    <div class="modal-info-container py-12 px-6">
                                                        <!-- Contenido de la información adicional del animal -->


                                                        <div class="modal-column">
                                                            <img src="{{ asset($misSolicitud->animals->img) }}" style="max-width: 100%; max-height: 100%; margin-bottom: 5%" alt="imagen">
                                                            <p style="font-size: 120%; font-style: normal; font-weight: bold; margin-bottom: 4%">Vacunas:</p>

                                                           @foreach($misSolicitud->vacunasModal as $vacunaModal)
                                                               @if($vacunaModal->adquisicion =="Sin_Aplicar")
                                                                <li style="margin-bottom: 3%">{{ $vacunaModal->nombre }} <p style="font-family: 'Roboto Slab', serif ; font-size: 110%; color:  @if($vacunaModal->adquisicion == 'Aplicada')  #22b14c @else #d39e00 @endif ">({{ $vacunaModal->adquisicion }})</p></li><br>
                                                                @endif
                                                            @endforeach

                                                            <br>
                                                            <p>|<strong style="font-size: 90%; font-style: normal; font-palette: light">ELIGE EL METODO DE PAGO*</strong> |</p>
                                                            <div class="select-container">
                                                                <select id="metodoPago_{{ $misSolicitud->animals->id }}" class="block mt-1" name="metodoPago" required>
                                                                    <option value="">Selecciona una opción</option>
                                                                    <option value="PayPal">PayPal</option>
                                                                    <option value="Efectivo">Efectivo</option>
                                                                    <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="modal-column">
                                                            <h3 style="font-family: 'Roboto Slab', serif; font-size: 120%; margin-bottom: 10%"><strong>¡Ahora estas mas cerca de adoptar a "{{ $misSolicitud->animals->nombreAnimaladopocion }}"!</strong></h3>
                                                            <p style="font-family: 'Roboto Slab', serif; font-style: italic">El costo de las vacunas incluyen IVA comercial del 19%</p><br>
                                                            <p><strong>Vacunas a cancelar:</strong> </p><br>
                                                            @php
                                                                $subTotal = 0;
                                                                $Total=0;
                                                                $IVA =0;
                                                            @endphp
                                                            @foreach($misSolicitud->vacunasPriceModal as $vacunaPrice)

                                                            <p><strong>Nombre:</strong>  {{$vacunaPrice->nombre}} </p>
                                                            <p style="text-align: right"><strong>Costo:  </strong>  $ {{$vacunaPrice->price}}</p>

                                                                    <p> ____________________________________</p><br>

                                                                    @php
                                                                        $subTotal += $vacunaPrice->price;
                                                                        $IVA = $subTotal*0.19;
                                                                        $Total = $IVA + $subTotal;
                                                                    @endphp


                                                            @endforeach
                                                            <p style="text-align: right" ><strong>Subtotal: </strong> $ {{ $subTotal }}</p>
                                                            <p style="text-align: right" ><strong>IVA: </strong> $ {{ $IVA }}</p>
                                                            <p style="text-align: right" ><strong>Total a pagar: </strong> $ {{ $Total }}</p>

                                                            <div class="modal-container-botons">
                                                                <div class="modal-boton2">


                                                                    <form method="POST" action="{{route('comprarVacuna')}}"  id="concluirForm{{ $misSolicitud->animals->id  }}"  enctype="multipart/form-data">
                                                                        @csrf

                                                                        @foreach($misSolicitudes as $misSolicitud)
                                                                            <input type="hidden" name="idAdoption" value="{{ $misSolicitud->id_animaladopcion }}">


                                                                        <input type="hidden" name="idAnimal" value="{{ $misSolicitud->animals->id }}">
                                                                        <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="iva" value="{{ $IVA }}">
                                                                        <input type="hidden" name="subTotal" value="{{ $subTotal }}">
                                                                        <input type="hidden" name="total" value="{{ $Total }}">
                                                                        @endforeach
                                                                        </form>
                                                                    <button class="SadoptarButton" onclick="concluirAdopcion('{{ $misSolicitud->animals->id }}')">Acepto Comprar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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



    <!--*******************************************-->
    <!-- Cuadro de confirmación TERMINAR PROCESO-->
    <div id="confirmationModalConcluir" style="display: none">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Quieres continuar con el Pago?</p>
            <button id="succesButton" onclick="confirmActionCon()">Confirmar</button>
            <button id="cancelButton" onclick="closeConfirmationCon()">Cancelar</button>
        </div>
    </div>
    <!----FIN CUADRO DE CONFIRMACION--->
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
        //*****concluision de adopcion******
        function confirmActionCon() {
            var formId = window.formToSubmit;

            // Enviar el formulario asociado con el ID almacenado en la variable global
            document.getElementById(formId).submit();
        }
        function concluirAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'concluirForm' + adopcionId;
            var modalId = formId.replace('concluirForm', '');
            var metodoPagoSelect = document.getElementById('metodoPago_' + modalId);

            if (metodoPagoSelect.value === '') {
                alert('Por favor, selecciona un método de pago.');
                return;
            } else {
                // Crear un campo oculto con el valor seleccionado del método de pago
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'metodoPago';
                hiddenInput.value = metodoPagoSelect.value;

                // Agregar el campo oculto al formulario
                var form = document.getElementById(formId);
                form.appendChild(hiddenInput);
                // Mostramos el modal de confirmación
                document.getElementById('confirmationModalConcluir').style.display = 'block';
                // Almacenamos el ID del formulario en una variable global
                window.formToSubmit = formId;
            }
        }
        function closeConfirmationCon() {
            document.getElementById('confirmationModalConcluir').style.display = 'none';
        }
        //****FIN conclusion adopcion**********


        //**MODAL DE INFORMACION OBTENER VACUNA

        function openInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "block";
        }

        function closeInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "none";
        }

        //***FIN MODAL DE INFORMACION OBTENER VACUNA********

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
