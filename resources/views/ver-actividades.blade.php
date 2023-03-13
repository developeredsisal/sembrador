<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
    <title>Sembrador Escolar - Actividades</title>
</head>

<body>
    <x-navbar />

    <div class="main">
        <x-appbar />

        <div class="container-fluid">
            <div class="card-header">
                <h2 class="role text-center">Actividades de la lectura: "{{ $lectura->nombre }}"</h2>
            </div>
            <div class="card-container">
                @foreach ($actividades as $actividad)
                    <div class="card">
                        <div class="card-image">
                            <img style="width: 100%"
                                src="{{ URL::to('/') . '/actividades/' . $actividad->id . '/' . $actividad->imagen }}"
                                alt="">
                        </div>
                        <div class="nombre">{{ $actividad->nombre }}</div>
                        <a class="btn btn-primary" href="{{ url('actividad/' . $actividad->id) }}" role="button">Ver
                            actividad</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
    <x-foot />
</body>

</html>
