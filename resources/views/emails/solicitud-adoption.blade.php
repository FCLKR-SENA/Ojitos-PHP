<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido a nuestra comunidad de adopción!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        .animal-info {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
        .animal-info h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .animal-info p {
            color: #666;
            margin-bottom: 10px;
        }
        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>¡Hola!</h2>
    <p>Estimado {{Auth::user()->name}} {{Auth::user()->lastname}},

        ¡Bienvenido a nuestra comunidad de adopción de mascotas! Nos complace enormemente que hayas decidido dar el primer paso hacia la adopción de una mascota y ser parte de nuestra familia.

        Tu solicitud de adopción ha sido recibida y estamos emocionados de ayudarte en tu viaje para encontrar a tu compañero peludo ideal. Nuestro equipo está comprometido en hacer este proceso lo más suave y gratificante posible para ti.

        Queremos que sepas que valoramos profundamente tu compromiso con la adopción responsable de mascotas y estamos aquí para brindarte todo el apoyo y la orientación que necesites a lo largo de este proceso.

        En breve, uno de nuestros representantes se pondrá en contacto contigo para discutir los detalles de tu solicitud y guiarte a través de los pasos siguientes. Mientras tanto, si tienes alguna pregunta o inquietud, no dudes en ponerte en contacto con nosotros en cualquier momento.

        ¡Gracias por elegir adoptar y por darle una segunda oportunidad a una mascota necesitada! Estamos emocionados de acompañarte en esta emocionante aventura.

        Con cariño,

        Ojitos - Refugio Animales </p>


    <div class="animal-info">
        <h3>Detalles de la solicitud de Adopcion:</h3>
        <p><strong>Nombre:</strong> {{ $adoption->animals->nombreAnimaladopocion }}</p>
        <p><strong>Raza:</strong> {{ $adoption->animals->raza }}</p>
        <p><strong>Especie:</strong> {{ $adoption->animals->especie_Animal }}</p>
        <p><strong>Edad:</strong> {{ $adoption->animals->age }} meses</p>
        <p><strong>Descripción:</strong> {{ $adoption->animals->observacionesAnimal }}</p>
    </div>
    <p>
        Recuerda que puedas hacer seguimiento sobre tu proceso de adopcion en la pestaña "Mis solicitudes" en tu espacio en Ojitos dashboard.

        ¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

