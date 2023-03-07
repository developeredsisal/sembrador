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
        <x-cartas />
    </div>
    <x-foot />
</body>

</html>