<!DOCTYPE html>
<html lang="">
<head >
    <title>Refugio Ojitos</title>
    <link rel="stylesheet" href="{{ asset('css/stylesin.css') }}">
    <style>

        .banner {
            width: 100%;
            height: 70px; /* Adjust the height as needed */
            background-image: url('{{ asset('images/Logo_invert.png') }}');
            background-size: 200px 70px;
            background-repeat: no-repeat;
            background-position: center;

        }
    </style>
</head>
<body>
<header>
    <div class="banner"></div>
    <nav style="background-color: #000000; padding: 20px; display: flex; justify-content: center; align-items: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> <h2 style="margin: 0; color: #ffffff;">Adopta la felicidad, un corazón fiel te está esperando.</h2> </nav>
</header>

<section class="hero">
    <h1>Unete ya a la familia OJITOS y cuida de una nueva mascota!</h1>
    @if (Route::has('login'))
        <div class="header-links btn-group">
            @auth
                @if (Auth::user()->role->name == 'USER')
                    <!-- Sección para clientes -->
                    <button class="btn-outline-dark btn-hover-color">
                    <a href="{{ url('/dashboardUser') }}" class="btn-filled-dark">
                        <span class="material-symbols-outlined"></span> Dashboard
                    </a>
                @elseif (Auth::user()->role->name == 'ADMIN')
                    <!-- Sección para administradores -->
                    <button class="btn-outline-dark btn-hover-color">
                    <a href="{{ url('/dashboardAdmin') }}" class="btn-filled-dark">
                        <span class="material-symbols-outlined"></span> Dashboard
                    </a>
                @endif
            @else
                <button class="btn-outline-dark btn-hover-color">
                    <a href="{{ route('login') }}" style="color: #000000; text-decoration: none;">
                        <span class="material-symbols-outlined"></span> Iniciar sesión
                    </a>
                </button>
                @if (Route::has('register'))
                    <button class="btn-filled-dark">
                        <a href="{{ route('register') }}" style="color: #ffffff; text-decoration: none;">
                            <span class="material-symbols-outlined"></span> Regístrate
                        </a>
                    </button>
                @endif
            @endauth
        </div>
    @endif


</section>

<section>
    <h2>ADOPTA AL ANIMAL QUE MAS TE GUSTE</h2>
    <ul class="shop-pets">
        <li class="card-large card-light" id="sup-dog">
            <div class="card-image"><img src="https://ouch-cdn2.icons8.com/5ccPOQq69UKQcbmXfjvOScfFc9NXKG0Xu6DPNQ8b0f8/rs:fit:368:247/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvMTEw/LzFlODdiYzcyLTBl/OWEtNDFlNS05N2Ey/LTMzYTA4MDQ5MWU1/OC5wbmc.png" alt="Dog Image"></div>
            <ul>
                Todo tipo de perros!
                <li><a href="#">Protectores fieles</a></li>
                <li><a href="#">Energía desbordante</a></li>
                <li><a href="#">BAlmas puras</a></li>
                <li><a href="#">Lealtad infinita</a></li>
            </ul>
        </li>

        <li class="card-large card-dark" id="sup-cat">
            <div class="card-image"><img src="https://ouch-cdn2.icons8.com/RjiKOF2gGKiIVnIMFi0O1a4aU7DoHfhbkXr2JbUYZ3A/rs:fit:368:313/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvMzEy/LzliNDQ3MmVlLWZh/YjMtNDQwNy1iOWVh/LWMwOTdlYWNjNWE3/NS5wbmc.png" alt="Cat Image"></div>
            <ul>Todo de tipo de gatos!
                <li><a href="#">Independencia cautivadora</a></li>
                <li><a href="#">Elegancia sutil</a></li>
                <li><a href="#">Compañeros silenciosos</a></li>
                <li><a href="#">CDale una segunda oportunidad</a></li>
            </ul>
        </li>

    </ul>
</section>
<section>
    <h2>Algunos de nuestros productos</h2>
    <ul class="services">
        <li class="card-large card-dark card-wide" id="serv-groom">
            <div class="card-image">
                <img src="https://ouch-cdn2.icons8.com/T11rfGmMKgcStJyAFKNgtOfE79cadabx0DVMnvzA9Pk/rs:fit:368:313/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNDQx/LzFlYWU4MWY3LWQ1/ZjYtNDM2Ny1hZjM5/LWVmNTFmMGM5Njk4/MS5wbmc.png" alt="Grooming Image">
            </div>
            <ul>
                <li>Aseo de Mascotas <span class="subtitle"></span></li>
                <li><a href="#">Cepillos</a><span></span></li>
                <li><a href="#">Cortauñas</a><span></span></li>
                <li><a href="#">Zapaticos</a><span></span></li>
            </ul>
        </li>
        <li class="card-large card-dark card-wide" id="serv-board">
            <div class="card-image">
                <img src="https://ouch-cdn2.icons8.com/F5Ea1suZtMYimKDkJr0CJLO_1bju6-bTyT1EuDKEg8s/rs:fit:368:254/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvMjcx/LzVjMzE4NWM0LWZh/NTMtNGQ1OS05ZTM2/LTZjYzBhNGU3ODg0/NC5wbmc.png" alt="Boarding Image">
            </div>
            <ul>
                <li>Descanso y Juguetes <span class="subtitle"></span></li>
                <li><a href="#">Camas</a><span></span></li>
                <li><a href="#">Ratones y juesos de goma</a><span></span></li>
            </ul>
        </li>
    </ul>
</section>


<footer>
    <ul>
        <div class="footer-contact">
            <h3>Contáctanos</h3>
            <p>Teléfono: (123) 456-7890</p>
            <p>Correo electrónico: info@refugioojitos.com</p>
            <p>Dirección: Calle Falsa 123, Ciudad de Ejemplo</p>
        </div>
        <p>&copy; <?php echo date("Y"); ?> Refugio de Animales OJITOS. Todos los derechos reservados.</p>
    </ul>
</footer>
</body>
</html>
