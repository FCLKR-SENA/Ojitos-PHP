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
    <p>Fecha: {{$adop->updated_at}}</p>

       <p> Estimado/a {{$adop->users->name}} {{$adop->users->lastname}}:

           Nos complace enormemente agradecerte por tu generoso pago de la vacuna y por tu genuino interés en adoptar a {{$adop->animals->nombreAnimaladopocion }}. Tu compromiso y dedicación hacia el bienestar de los animales son verdaderamente inspiradores.

           Queremos expresar nuestro más sincero agradecimiento por tu contribución, que no solo beneficia a {{ $adop->animals->nombreAnimaladopocion }}, sino que también nos permite continuar con nuestra misión de brindar atención y encontrar hogares amorosos para los animales necesitados.

           Tu decisión de adoptar a {{ $adop->animals->nombreAnimaladopocion }} es un acto de amor y compasión que cambiará su vida para siempre. Estamos seguros de que le brindarás el cariño, la atención y el hogar que tanto merece. Tu dedicación para asegurar su salud y bienestar al pagar por su vacuna es un testimonio de tu compromiso como futuro dueño responsable.

           Nos complace adjuntar la factura correspondiente a la compra de la vacuna. Por favor, revisa los detalles de la factura y no dudes en contactarnos si tienes alguna pregunta o inquietud.

           Una vez más, queremos expresar nuestra más profunda gratitud por tu generosidad y por abrir tu corazón y tu hogar a {{ $adop->animals->nombreAnimaladopocion }}. Estamos ansiosos por ver cómo se desarrolla este hermoso vínculo entre ustedes y esperamos recibir noticias sobre su nueva vida juntos.

           Si necesitas cualquier tipo de asistencia o tienes alguna pregunta adicional durante el proceso de adopción, no dudes en comunicarte con nosotros. Estamos aquí para apoyarte en cada paso del camino.

           Gracias nuevamente por tu amabilidad y compromiso. Tu acción hace una diferencia significativa en la vida de {{ $adop->animals->nombreAnimaladopocion }} y en nuestra labor de protección animal.

           Atentamente,<br>

            Ojitos - Regio de animales</p>

    <div class="animal-info">
        <h3>Información sobre el animal:</h3>
        <p><strong>Nombre:</strong> {{ $adop->animals->nombreAnimaladopocion }}</p>
        <p><strong>Raza:</strong> {{ $adop->animals->raza }}</p>
        <p><strong>Especie:</strong> {{ $adop->animals->especie_Animal }}</p>
        <p><strong>Edad:</strong> {{ $adop->animals->age }} meses</p>
        <p><strong>Descripción:</strong> {{$adop->animals->observacionesAnimal }}</p>
    </div>

    <p>Adjuntamos tu factura de compra.</p>
    <p>¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>
    <p>Apartir de este momento puedes desplazarte a nuestro refugia y pasar por nuevo compañero.</p>

    <!--<a href="{//{ route('contacto') }}" class="cta-button">Contactar</a>-->
</div>
</body>
</html>

