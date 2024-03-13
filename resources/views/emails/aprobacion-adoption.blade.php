<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información sobre el animal</title>
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

       <p> Estimado/a {{$adoption->users->name}} {{$adoption->users->lastname}}:

           Nos complace informarte que tu solicitud de adopción para {{ $adoption->animals->nombreAnimaladopocion }} ha sido evaluada y aceptada con éxito. Apreciamos profundamente tu interés en proporcionar un hogar amoroso a una mascota necesitada.

           Sin embargo, durante nuestra revisión, hemos observado que algunas vacunas son necesarias para la salud óptima de {{ $adoption->animals->nombreAnimaladopocion }} aún no han sido suministradas. Es crucial completar este paso antes de que podamos proceder con la adopción.

           Para facilitar este proceso, te pedimos amablemente que hagas el pago por las vacunas faltantes. Puedes completar este pago de manera rápida y segura a través de nuestra plataforma en línea. Por favor, sigue el siguiente enlace una vez hallas iniciado sesion para completar el proceso de pago o ve a tu pestaña "Mis solicitudes":
       </p>
    <div>
        <a href="{{$url }}" style="background-color: #644494; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">Iniciar Sesión y Pagar</a>
    </div>


        <p>   Una vez que hayas realizado el pago, estaremos encantados de coordinar una cita para que puedas recoger a {{ $adoption->animals->nombreAnimaladopocion }} y llevarlo a su nuevo hogar.

           Agradecemos tu comprensión y cooperación en este asunto. Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en contactarnos.

           ¡Esperamos con ansias verte pronto y compartir la emoción de dar la bienvenida a {{ $adoption->animals->nombreAnimaladopocion }} a tu hogar!

        Ojitos - Regio de animales</p>

    <div class="animal-info">
        <h3>Información sobre el animal:</h3>
        <p><strong>Nombre:</strong> {{ $adoption->animals->nombreAnimaladopocion }}</p>
        <p><strong>Raza:</strong> {{ $adoption->animals->raza }}</p>
        <p><strong>Especie:</strong> {{ $adoption->animals->especie_Animal }}</p>
        <p><strong>Edad:</strong> {{ $adoption->animals->age }} años</p>
        <p><strong>Descripción:</strong> {{$adoption->animals->observacionesAnimal }}</p>
    </div>

    <p>¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

