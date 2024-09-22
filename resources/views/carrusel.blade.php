<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Carrusel de Imágenes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        html, body {
            height: 100%; /* Ocupa toda la altura de la ventana */
            margin: 0; /* Elimina márgenes */
        }

        .carousel {
            height: 100%; /* Asegura que el carrusel ocupe toda la altura disponible */
        }

        .carousel-item {
            height: 100%; /* Asegura que cada item del carrusel ocupe toda la altura */
        }

        .carousel-item img {
            width: 100%; /* Ajusta la imagen al 100% del contenedor */
            height: 100%; /* Asegura que la imagen ocupe toda la altura */
            object-fit: cover; /* Cubre el área sin distorsionar la imagen */
        }
    </style>
</head>
<body>

<audio id="background-music" loop>
    <source src="{{ asset('audio/sanlucas.mp3') }}" type="audio/mpeg">
    Tu navegador no soporta audio.
</audio>

<div id="theCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <!-- Indicadores -->
    <ol class="carousel-indicators">
        @foreach($imagenes as $key => $imagen)
            <li data-target="#theCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner" role="listbox">
        @foreach($imagenes as $key => $imagen)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $imagen->ruta) }}" class="d-block" alt="Imagen {{ $key + 1 }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Imagen {{ $key + 1 }}</h5>
                    <p>{{ $frases[$key % count($frases)] }}</p> <!-- Mostrar la frase correspondiente -->
                </div>
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#theCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#theCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<a href="{{ route('mostrar.imagenes') }}" class="btn btn-success mt-3">Volver a la Galería</a>

<script>
    // Inicia la música al cargar la ventana
    window.onload = function() {
        document.getElementById('background-music').play();
    };
</script>

</body>
</html>
