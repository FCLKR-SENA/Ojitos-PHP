<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información sobre el animal</title>
    <style>
        body {

            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .logo {
                flex: 0 0 auto;
            }

            .date {
                flex: 1 1 auto;
                text-align: right;
            }

            .content {
                text-align: left;
            }

            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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

<header>


</header>

<body>
<div class="container">
    <div class="header">
        <div class="logo">
            <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}" width="100" >
        </div>
        <div class="date">
            <p><strong>Fecha: </strong>{{$fecha_adopcion}}</p>
        </div>
    </div>

    <div class="content">
        <p><strong>Estimado/a: </strong>{{$userName}} {{$apellido_adoptante}}</p>

        <div style="text-align: center">
            <p>¡Felicitaciones por tu adopción!</p>
            <p>Adjuntamos tu certificado de adopción.</p>
            <p>Gracias por darle un hogar amoroso a.</p>
            <p>Atentamente,<br>El equipo de adopciones Ojitos</p>
            <p>Ojitos - Regio de animales</p>
        </div>

        <div style="text-align: center">
            <p><strong>{{$nombre_animal}}</strong></p>
            <p><strong>{{$raza}}</strong></p>
            <p><strong>{{$especie}}</strong></p>
            <p><strong>{{$edad}} Meses</strong></p>
        </div>

        <p style="text-align: center; margin-top: 20%">¡Gracias por tu interés en adoptar un nuevo amigo peludo!</p>
    </div>
</div>
</body>

</html>

