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
    <h2>Notificación de Interés en Adopción del Animal ({{$adoption->animals->nombreAnimaladopocion}})</h2>
    <p>Estimado Equipo del Refugio de Animales,

        Espero que este correo electrónico los encuentre bien. Me dirijo a ustedes para informarles que una persona ha expresado su interés en adoptar uno de los animales bajo su cuidado. A continuación, les proporciono los detalles del solicitante: </p>
<div class="animal-info">
    <h3>Detalles de la solicitud:</h3>
    <p><strong>Nombre del Solicitante:</strong> {{$adoption->users->name}}</p>
    <p><strong>Apellidos del solicitandte</strong> {{$adoption->users->lastname}}</p>
    <p><strong>Correo Electrónico del Solicitante:</strong> {{$adoption->users->email}}</p>
    <p><strong>Animal de Interés:</strong> {{$adoption->animals->nombreAnimaladopocion}}</p>
    <p><strong>Fecha de Interés:</strong> {{$adoption->created_at}}</p>
</div>


       <p> Les invito a que se comuniquen con el solicitante lo antes posible para discutir los detalles adicionales y coordinar una visita al refugio si es necesario. Agradecemos su dedicación y esfuerzo para encontrar hogares amorosos para los animales necesitados.

        Si necesitan más información o tienen alguna pregunta, no duden en ponerse en contacto conmigo.

        Gracias por su atención y colaboración.</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

