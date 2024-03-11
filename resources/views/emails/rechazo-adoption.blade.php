<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu solicitud ha sido rechazada</title>
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
    <p>Estimado {{$adoption->users->name}} {{$adoption->users->lastname}},

        Agradecemos sinceramente su interés en adoptar uno de nuestros animales y el tiempo que ha dedicado a completar el proceso de solicitud. Lamentablemente, después de revisar cuidadosamente su solicitud, hemos tomado la difícil decisión de rechazarla en esta ocasión.

        Entendemos que esta noticia puede ser decepcionante, pero queremos asegurarle que esta decisión se tomó con la mejor intención para garantizar el bienestar tanto del animal como del adoptante. Le animamos a explorar otras opciones de adopción en refugios cercanos o en organizaciones de rescate, y estamos aquí para ofrecer cualquier orientación adicional que pueda necesitar en este proceso.

        Una vez más, le agradecemos su interés en proporcionar un hogar amoroso para uno de nuestros animales, y esperamos que encuentre la mascota perfecta que se adapte a sus necesidades en el futuro.

        Atentamente,
        Ojitos - Refugio Animales </p>


    <div class="animal-info">
        <h3>Información de la solicitud:</h3>
        <p><strong>N° Solicitud:</strong> {{ $adoption -> id_animaladopcion }}</p>
        <p><strong>Creacion de la solicitud:</strong> {{ $adoption -> created_at  }}</p>
        <p><strong>Animal esperado:</strong> {{$adoption -> animals->nombreAnimaladopocion }}</p>
    </div>

    <p>¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

