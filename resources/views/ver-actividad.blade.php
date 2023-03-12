<!DOCTYPE html>
<html lang="es">

<head>
    <x-head />
    <title>Sembrador Escolar - Ver actividad</title>
    <style>
        .iframe-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 46%;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 426px) {
            .iframe-container {
                padding-bottom: 100%;
            }
        }

        @media (min-width: 767px) and (max-width: 1025px) {
            .iframe-container {
                padding-bottom: 60%;
            }
        }
    </style>
</head>

<body>
    <x-navbar />
    <div class="main">
        <x-appbar />

        <div class="container-fluid">
            <h2 class="role">{{ $actividad[0]->nombre }}</h2>
            <div class="row">
                <div class="iframe-container">
                    <iframe src="{{ URL::to('/') . '/actividades/' . $actividad[0]->id . '/' . $actividad[0]->archivo }}"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <x-foot />
</body>

</html>
