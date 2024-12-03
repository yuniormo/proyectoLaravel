
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Reservas de Canchas de Fútbol</title>
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
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('{{ asset('imagenes/imagen2.jpg') }}');
    background-size: cover; /* La imagen ocupa todo el espacio */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-position: center; /* Centra la imagen en el fondo */
}

.container {
    width: 80%;
    max-width: 1000px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

header {
    background-color: #9fa5ad;
    text-align: center;
    padding: 10px;
}

header h1 {
    font-size: 22px;
    color: #fff;
}

.content {
    display: flex;
}

.image-section {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-section img {
    width: 100%;
    height: auto;
    border-bottom-left-radius: 10px;
    border-top-left-radius: 10px;
}

.login-section {
    flex: 1;
    padding: 30px;
    background-color: #a6e0b0;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

.login-section h2 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #2c3e50;
}

.login-section p {
    font-size: 14px;
    margin-bottom: 20px;
    color: #34495e;
}

.login-section label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
}

.login-section input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-section button {
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.login-section button:hover {
    background-color: #2980b9;
}

.register-link {
    display: block;
    text-align: center;
    margin-top: 10px;
    color: #3498db;
    text-decoration: none;
}

.register-link:hover {
    text-decoration: underline;
}

</style>
<body>
    <div class="container">
        <header>
            <h1>Sistemas de Reservas de Canchas de Futbol</h1>
        </header>
        <div class="content">
            <div class="image-section">
                <img src="{{ asset('imagenes/registro.jpg') }}" alt="Imagen del estadio de fútbol">
            </div>
            <div class="login-section">
                <h2>INICIO DE SECCION</h2>
                <p>Inicie sesión con su cuenta.</p>

                {{-- Mostrar errores de validación --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Acceso</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>