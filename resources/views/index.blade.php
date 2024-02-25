<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ojitos - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #333333;
        }
        header {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
            color: #ffffff;
            display: flex;
            justify-content: space-between; /* Alineación de los enlaces */
            align-items: center; /* Centrar verticalmente los elementos */
        }
        nav {
            background-color:  #24b44c ;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: #000000;
            text-decoration: none;
            padding: 10px 20px;
        }
        section {
            padding: 50px;
            text-align: center;
        }
        .call-to-action {
            background-color: #1d2124;
            padding: 50px;
            color: #ffffff;
        }
        .call-to-action h2 {
            margin-bottom: 20px;
        }
        .call-to-action p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .Logo{
            width: 18%;
            height: 15%;
        }

        .slogan{
            color: #000000;
            padding: 20px;
            text-align: left;
            display: flex;
            align-items: center; /* Centrar verticalmente los elementos */
        }

        footer {
            background-color:  #24b44c;
            color: #000000;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <img src="{{ asset('images/Logo.png') }}" alt="Logo de la empresa" class="Logo">
    <h2 class="slogan">Promotores de la salud y bienestar</h2>
    @if (Route::has('login'))
    <div class="header-links">
        @auth
            @if (Auth::user()->role->name == 'USER')
                <!-- Sección para clientes -->
                <a href="{{ url('/dashboardUser') }}" style="background-color: #24b44c; color: #35524a; padding: 5px 15px; border-radius: 5px; text-decoration: none;">Dashboard</a>
            @elseif (Auth::user()->role->name == 'ADMIN')
                <!-- Sección para administradores -->
                <a href="{{ url('/dashboardAdmin') }}" style="background-color: #24b44c; color: #35524a; padding: 5px 15px; border-radius: 5px; text-decoration: none;">Dashboard</a>
            @endif
        @else
        <a href="{{ route('login') }}" style="color: #000000; text-decoration: none; margin-right: 20px;">Iniciar sesión</a>
            @if (Route::has('register'))
        <a href="{{ route('register') }}" style="background-color:  #24b44c ; color: #000000; padding: 5px 15px; border-radius: 5px; text-decoration: none;">Registrarse</a>
            @endif
        @endauth
    </div>
    @endif
</header>

<nav>
    <a href="#">Inicio</a>
    <a href="#">Adopción</a>
    <a href="#">Voluntariado</a>
    <a href="#">Donaciones</a>
    <a href="#">Contacto</a>
</nav>

<section>
    <h2>¡Bienvenidos a nuestro refugio!</h2>
    <p>Somos un refugio comprometido con el bienestar animal. Nuestro objetivo es encontrar hogares amorosos para todos nuestros amigos peludos.</p>
    <img src="img/refugio.jpg" alt="Refugio de Animales">
</section>

<div class="call-to-action">
    <h2>¿Listo para adoptar?</h2>
    <p>¡Haz la diferencia en la vida de un animal! Visita nuestro refugio y encuentra a tu nuevo compañero peludo.</p>
    <a href="#" style="background-color: #ffffff; color: #35524a; padding: 10px 30px; border-radius: 5px; text-decoration: none;">Ver mascotas disponibles</a>
</div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Refugio de Animales. Todos los derechos reservados.</p>
</footer>

</body>
</html>
