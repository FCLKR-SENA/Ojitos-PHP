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
    <p>¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>

    <div class="animal-info">
        <h3>Información sobre el animal:</h3>
        <p><strong>Nombre:</strong> {{ $animal->nombreAnimaladopocion }}</p>
        <p><strong>Raza:</strong> {{ $animal->raza }}</p>
        <p><strong>Especie:</strong> {{ $animal->especie_Animal }}</p>
        <p><strong>Edad:</strong> {{ $animal->age }} años</p>
        <p><strong>Descripción:</strong> {{ $animal->observacionesAnimal }}</p>
    </div>

    <p>Para obtener más detalles o si estás interesado en adoptar a {{ $animal->nombreAnimaladopocion  }}, por favor contáctanos.</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

