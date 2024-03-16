<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #6d5cae;
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            color: #8e7cc3;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
            color: #6d5cae;
        }

        .total {
            font-weight: bold;
            color: #6d5cae;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            color: #888;
        }
    </style>
    <title>Factura de Vacuna</title>
    <style>
        /* Estilos CSS para la plantilla de la factura */
    </style>
</head>
<body>
<h1>Factura de Vacuna</h1>
<h1>N° {{$numeroFactura}}</h1>

<h2>Detalles del Adoptante:</h2>
<p>Nombre: {{ $userName }}</p>
<p>Apellidos: {{ $apellido_adoptante }}</p>
<p>Fecha solicitud: {{ $fecha_solicitud }}</p>

<h2>Detalles de la Factura:</h2>
<p>Número de Factura: {{ $numeroFactura}}</p>
<p>Fecha: {{ $dateFactura }}</p>

<h2>Detalles del Animal y la Vacuna:</h2>
<p>Nombre del Animal: {{ $nombre_animal }}</p>
<p>especie: {{ $especie}}</p>
<p>raza: {{ $raza }}</p>
<p>Edad {{ $edad }} Meses</p>


<h2>Detalles Cancelacion:</h2>
<p>Nombre del Animal: {{ $nombre_animal }}</p>

<table>
    <thead>
    <tr>
        <th style="text-align: left;">Vacunas</th>
        <th style="text-align: right;">Precio</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nombreVacuna as $index => $nombre)
        <tr>
            <td style="text-align: left;">{{ $nombre }}</td>
            <td style="text-align: right;">{{ $precioVacuna[$index] }}</td>
        </tr>
    @endforeach

    </tbody>
</table>


    <p style="text-align: right;">subTotal:  {{ $subtotal }}</p>
    <p style="text-align: right;">IVA (19%):  {{ $IVA }}</p>
    <p style="text-align: right;">Total: {{ $total }}</p>
    <p style="text-align: right;">Medio de cancelacion:  {{ $medioPago }}</p>

<p>Gracias por tu pago y por tu interés en adoptar a {{ $nombre_animal }}. Tu contribución es muy apreciada y nos permite continuar con nuestra misión de cuidar y encontrar hogares amorosos para los animales necesitados.</p>
</body>
</html>
