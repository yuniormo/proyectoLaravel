<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background-color: #f3f3f3;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('imagenes/imagen2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .form-container {
        background-color: #2ecc71;
        padding: 20px;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #fff;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        color: #fff;
        margin-bottom: 5px;
    }

    input {
        padding: 10px;
        margin-bottom: 15px;
        border: none;
        border-radius: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
    }

    button {
        padding: 10px;
        background-color: #27ae60;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #1e8449;
    }

    button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }

    .error {
        background-color: #ffebee;
        color: #c62828;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        list-style: none;
    }

    .success {
        color: green;
        text-align: center;
        margin-bottom: 15px;
    }
</style>
<body>
    <div class="form-container">
        <h2>Registrarse</h2>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.index') }}" method="POST">
            @csrf
            <label for="name">Nombre y Apellidos:</label>
            <input type="text" id="name" name="name" placeholder="Ingresa tu nombre completo" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required>

            <button type="submit">Registrarse</button>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value.trim();
            const passwordConfirmation = document.getElementById('password_confirmation').value.trim();

            if (password !== passwordConfirmation) {
                alert("Las contraseñas no coinciden.");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
