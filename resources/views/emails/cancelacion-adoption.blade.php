<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu solicitud ha sido cancelada</title>
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

        Espero que este mensaje te encuentre bien. Quería comunicarme contigo para informarte sobre el estado actual de tu solicitud de adopción en proceso para <strong>{{$adoption -> animals->nombreAnimaladopocion }}</strong>.

        Después de una cuidadosa revisión y consideración de todos los aspectos relacionados con la adopción, lamentablemente hemos llegado a la decisión de cancelar el proceso de adopción en curso. Entendemos que esta noticia puede ser decepcionante, y queremos asegurarte que esta no fue una decisión tomada a la ligera.

        Por favor, comprende que nuestra principal preocupación es el bienestar tanto del animal como de los futuros adoptantes, y tomamos esta decisión con el mayor cuidado y consideración posible.

        Entendemos que esto puede ser una noticia difícil de digerir, y queremos expresar nuestro más profundo agradecimiento por tu interés en brindar un hogar amoroso a uno de nuestros animales. Si deseas discutir más sobre esta decisión o necesitas más información, no dudes en ponerte en contacto con nosotros en cualquier momento.

        Agradecemos sinceramente tu comprensión y apoyo continuo hacia nuestra organización.

        Con aprecio,

        Ojitos - Refugio Animal</p>


    <div class="animal-info">
        <h3>Información de la solicitud:</h3>
        <p><strong>N° Solicitud:</strong> {{ $adoption -> id_animaladopcion }}</p>
        <p><strong>Creacion de la solicitud:</strong> {{ $adoption -> created_at  }}</p>
    </div>

    <p>¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

