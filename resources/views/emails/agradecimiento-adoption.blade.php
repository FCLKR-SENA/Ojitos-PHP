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
    <p>Fecha: {{$adoption->fecha_adopcion}}</p>

       <p> Estimado/a {{$adoption->users->name}} {{$adoption->users->lastname}}:

        Queremos expresar nuestro más sincero agradecimiento por haber decidido abrir su corazón y su hogar para darle una nueva vida a {{ $adoption->animals->nombreAnimaladopocion }}. Su generosidad y compromiso con la adopción responsable de animales son un ejemplo inspirador para nuestra comunidad.

        Al adoptar a {{ $adoption->animals->nombreAnimaladopocion }}, no solo le ha brindado un hogar amoroso, sino que también ha contribuido significativamente a reducir el número de animales sin hogar y a fomentar una cultura de cuidado y respeto hacia ellos. <br> Excelente selección de adoptar en lugar de comprar contribuye a cambiar vidas y a crear un mundo más compasivo para todas las criaturas.

        Nos complace informarle que el proceso de adopción se ha completado satisfactoriamente y que{{ $adoption->animals->nombreAnimaladopocion }} está ahora oficialmente parte de su familia. Estamos seguros de que juntos crearán recuerdos inolvidables y compartirán momentos de amor y felicidad.<br>

        Por favor, no dude en ponerse en contacto con nosotros si necesita algún consejo o asistencia adicional en el futuro. Estamos aquí para apoyarle en su viaje como dueño de mascota y para asegurarnos de que tanto usted como {{ $adoption->animals->nombreAnimaladopocion }} tengan una experiencia maravillosa juntos.

        Una vez más, le agradecemos profundamente por elegir la adopción y por brindarle a {{ $adoption->animals->nombreAnimaladopocion }} una segunda oportunidad en la vida. Le deseamos a usted y a su nueva mascota todo lo mejor en esta emocionante aventura que están por comenzar juntos.

        Con gratitud y mejores deseos,<br>

        Ojitos - Regio de animales</p>

    <div class="animal-info">
        <h3>Información sobre el animal:</h3>
        <p><strong>Nombre:</strong> {{ $adoption->animals->nombreAnimaladopocion }}</p>
        <p><strong>Raza:</strong> {{ $adoption->animals->raza }}</p>
        <p><strong>Especie:</strong> {{ $adoption->animals->especie_Animal }}</p>
        <p><strong>Edad:</strong> {{ $adoption->animals->age }} meses</p>
        <p><strong>Descripción:</strong> {{$adoption->animals->observacionesAnimal }}</p>
    </div>

    <p>Adjuntamos tu certificado de adopción.</p>
    <p>¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

