<style>
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
                                <img src="{{ asset($animal->img) }}" style="max-width: 70%; max-height: 90%;" alt="imagen" >
                                    </div>

                                    <div class="modal-column ">
                                    <h2>Información adicional del animal</h2>
                                <p>Identificacion: {{ $animal->id }}</p>
                                <p>Nombre: {{ $animal->nombreAnimaladopocion }}</p>
                                <p>Nombre: {{ $animal->especie_Animal }}</p>
                                <p>Raza: {{ $animal->raza }}</p>
                                <p>Edad: {{ $animal->age }}</p>
                                <p>Observaciones: {{ $animal->observacionesAnimal }}</p>
                                        <div class="modal-container-botons">
                                            <div class="modal-boton1">
                                                <button class="SinfoButton">Mas Informacion</button>
                                            </div>

                                            <div class="modal-boton2">
                                                <button class="SadoptarButton">Solicitar Adopcion</button>
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



    <!--MODAL PARA IMAGEN-->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content" src="" alt="imagen">
    </div>

    <script>
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
