<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sembrador Escolar - Inicio sesión</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login">
        <div class="form">
            <form method="POST" action="{{ route('inicia-sesion') }}">
                @csrf
                <h2>Inicio de sesión</h2>
                <div class="form-group row">
                    <label for="email">{{ __('Correo electrónico') }}</label>

                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="nombre@correo.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-pass" for="password">{{ __('Contraseña') }}</label>

                    <div>
                        <div class="password-input-container">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Escribe tu contraseña">
                            <img id="eye-icon" src="{{ asset('images/cerrado.svg') }}"
                                onclick="togglePasswordVisibility()" />
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit"><strong>Ingresar</strong></button>
            </form>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = "{{ asset('images/abierto.svg') }}";
            } else {
                passwordInput.type = "password";
                eyeIcon.src = "{{ asset('images/cerrado.svg') }}";
            }
        }
    </script>
</body>

</html>
