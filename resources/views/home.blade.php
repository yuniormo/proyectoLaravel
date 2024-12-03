
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva tu Cancha</title>
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
    background-color: #e0f7f3;
    background-image: url('imagenes/imagen1.jpg') ;
    background-size: cover; /* La imagen ocupa todo el espacio */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-position: center; /* Centra la imagen en el fondo */
   
    height: 100vh;
}

header {
    background-color: #52d681;
    padding: 20px;
    text-align: center;
    color: #fff;
}
a{
    text-decoration: none;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

h1 {
    display: flex;
    font-size: 24px;
}

.button-container {
    display: flex;
    gap: 10px;
}

.btn {
    background-color: #3b5998;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
}

.btn:hover {
    background-color: #5b7bb8;
}

.welcome-section {
    display: flex;
    padding: 40px;
    justify-content: space-between;
    align-items: center;
    padding-right: 970px
}

.text-container {
    flex: 1;
    padding-right: 20px;
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
}

p {
    font-size: 25px;
    line-height: 1.6;
}

.image-container {
    flex: 1;
}

.image-container img {
    max-width: 100%;
    height: auto;
}
</style>
<body>
    <header>
        <div class="header-container">
            <h1>¡Reserva tu Cancha Gratis y Disfruta del Mejor Partido!</h1>
            <div class="button-container">
                <a href={{route('index')}} class="btn">Register</a>
                <a href={{route('create')}} class="btn">Login</a>
            </div>
        </div>
    </header>

    <section class="welcome-section">
        <div class="text-container">
            <h2>Hola Bienvenidos</h2>
            <p>
                Esta es la manera más fácil y gratuita de reservar tu cancha de microfútbol! Con solo unos clics, 
                podrás elegir el horario y ubicación que prefieras, sin costos adicionales y asegurando tu espacio 
                para el juego. Disfruta de una experiencia rápida y sin complicaciones, ¡y prepárate para el partido perfecto!
            </p>
        </div>
    </section>
</body>
</html>
