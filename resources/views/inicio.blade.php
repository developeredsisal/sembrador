<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
    <title>Sembrador Escolar</title>
</head>

<body>
    <x-navbar />

    <div class="main">
        <x-appbar />

        <div class="container-fluid">
            <div class="card-header">
                <h2 class="role">Lecturas Sembrador Escolar</h2>
            </div>
        </div>

        <div class="container">
            @foreach ($lecturas as $l)
                <div class="card">
                    <div class="card-image">
                        <img style="width: 100%" src="{{ URL::to('/') . '/lecturas/' . $l->id . '/' . $l->imagen }}"
                            alt="">
                    </div>
                    <div class="grado">{{ $l->grado_nombre }}</div>
                    <div class="nombre">{{ $l->nombre }}</div>
                    <a class="btn btn-primary" href="" role="button">Ver actividades</a>
                </div>
            @endforeach
        </div>
    </div>
    <x-foot />
</body>

</html>
