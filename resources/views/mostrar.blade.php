<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Imágenes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .thumbnail {
            width: 50%; /* Ajusta al 100% de su contenedor */
            height: auto; /* Mantiene la proporción de la imagen */
            max-width: 75px; /* Máximo ancho de 75px */
            max-height: 75px; /* Máximo alto de 75px */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Imágenes Subidas ({{ $contador }})</h2>
        <div class="row">
            @foreach($imagenes as $imagen)
                <div class="col-md-2 mb-4"> <!-- Cambiado a col-md-2 para más imágenes por fila -->
                    <div class="card">
                        <img src="{{ asset('storage/' . $imagen->ruta) }}" class="card-img-top thumbnail" alt="Miniatura">
                        <div class="card-body">
                            <h5 class="card-title">Imagen</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-success mt-3">Volver a Subir Imágenes</a>

        @if ($contador >= 4)
            <a href="{{ route('carrusel') }}" class="btn btn-primary mt-3">Ver Carrusel de Imágenes</a>
        @else
            <button class="btn btn-secondary mt-3" disabled>No hay suficientes imágenes Inserte mas para habilitar</button>
        @endif
        <a href="{{ route('flores') }}" class="btn btn-primary mt-3">Flores</a>
    </div>
</body>
</html>
