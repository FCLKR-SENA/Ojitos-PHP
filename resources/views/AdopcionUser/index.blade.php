<style>
    /* MODAL CONFIRMACION ENVIO*/
    .confirmacion{
        color: #ffffff;
    }

    .confirdesc{
        color: #ffffff;
    }

    .modalc {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }

    .modal-contentc {
        background-color: #1a282f;
        margin: 15% auto;
        padding: 2px;
        border-radius: 5px;
        border: 3px solid #644494;
        width: 30%;
        max-width: 400px;
        box-shadow: 0 4px 8px rgba(0,0,0,1);
        text-align: center; /* Centrar texto */
        justify-items: center;
    }

    .closec {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Estilos para los botones dentro del modal */
    .modal-buttons {
        margin-top: 20px;
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

    #cancelBtnc {
        margin-top: 25px; /* Agregar espacio entre el texto y el botón */
        cursor: pointer;
        padding: 4%;
        color: white;
        background-color:#3269c2;
        text-align: center;
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
        padding: 20px;
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
    .nombre{
        background-color: #644494;
        text-align: center;
        font-size: 150%;
    }
    .fecha{
        margin-bottom: 2%;
    }
    .imgen{
        margin-bottom: 2%;
    }
    .T1{
        font-size: 160%;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Separación entre las imágenes */
    }

    .item {
        flex: 0 0 calc(33.33% - 20px); /* Tamaño del item */
        max-width: calc(33.33% - 20px); /* Tamaño máximo del item */
        margin-bottom: 20px; /* Espacio entre las filas */
        justify-items: center;
    }

    .item img {
        max-width: 100%;
        height: auto;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nuestros Animales
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="T1">
                        Animales en adopcion
                    </h2>
                    <h3>¡Te mostramos acontinuacion a nuestros peludos disponibles para que hagan parte de tu familia!</h3>
                </div>

                <div class="container p-6 text-gray-900 dark:text-gray-100">
                    <!-- Aquí se repite este bloque para cada dato de la base de datos -->
                    @foreach($animals as $animal)
                    <div class="item ">
                        <!--------->
                        <div class="nombre">
                            <h1>{{ $animal->nombreAnimaladopocion}}</h1>
                        </div>
                        <!--------->
                        <div class="imgen flex justify-center items-center py-12 p-1">
                        @if($animal->img)
                            <img src="{{ asset($animal->img) }}" style="width: 75%; height: 100%;" alt="imagen" onclick="openModal('{{ asset($animal->img) }}')">
                        @else
                            ¡Pronto subiremos su imagen!
                        @endif
                        </div>
                        <!--------->
                        <h3>Raza: {{ $animal->raza}}</h3>
                        <h3>Edad(meses): {{ $animal->age}}</h3>
                        <p class="fecha">Fecha: {{ $animal->created_at }}</p>
                        <x-primary-button class="flex sm:justify-between h-8" onclick="openInfoModal('{{ $animal->id }}')">Ver más</x-primary-button>


                        <!-- ******************MODAL PARA INFORMACIÓN*************** -->
                        <div id="infoModal{{ $animal->id }}" class="modaldes">
                            <div class="modal-contentdes ">
                                <span class="close" onclick="closeInfoModal('{{ $animal->id }}')">&times;</span>
                                <div class="modal-info-container py-12 px-6 ">
                                <!-- Contenido de la información adicional del animal -->
                                    <div class="modal-column ">
                                <img src="{{ asset($animal->img) }}" style="max-width: 100%; max-height: 100%;" alt="imagen" >
                                    </div>

                                    <div class="modal-column ">
                                    <h2>Información adicional del animal</h2>
                                <p>Identificacion: {{ $animal->id }}</p>
                                <p>Nombre: {{ $animal->nombreAnimaladopocion }}</p>
                                <p>Especie: {{ $animal->especie_Animal }}</p>
                                <p>Raza: {{ $animal->raza }}</p>
                                <p>Edad: {{ $animal->age }}</p>
                                <p>Observaciones: {{ $animal->observacionesAnimal }}</p>
                                        <div class="modal-container-botons">
                                            <div class="modal-boton1">
                                                <button class="SinfoButton"  onclick="enviarCorreo('{{ $animal->id }}')">Mas Informacion</button>
                                            </div>

                                            <form id="emailForm{{ $animal->id }}" action="{{ route('enviar-correo') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                            </form>

                                            <div class="modal-boton2">
                                                <a href="http://localhost:8000/formadoption?animal_id={{ $animal->id }}">
                                                    <button class="SadoptarButton" >Solicitar Adopcion</button>
                                                </a>

                                            </div>
                                        </div>
                                </div>
                            </div>
                        <!-- *************FIN DEL MODAL PARA INFORMACIÓN*************** -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

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


    <!--MODAL PARA IMAGEN-->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content" src="" alt="imagen">
    </div>

    <script>
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
    </script>

</x-app-layout>
