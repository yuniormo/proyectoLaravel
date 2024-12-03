<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reserva de Canchas</title>
    <link rel="stylesheet" href="http://localhost/example-app/resources/css/app.css">
</head>
<style>
    .btn-cerrar-sesion {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-cerrar-sesion:hover {
        background-color: #d32f2f;
    }

    .btn-reservar, .btn-cancelar, .btn-verificar {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 10px;
    }

    .btn-reservar {
        background-color: #4CAF50;
        color: white;
    }

    .btn-reservar:hover {
        background-color: #45a049;
    }

    .btn-cancelar {
        background-color: #ff9800;
        color: white;
    }

    .btn-cancelar:hover {
        background-color: #f57c00;
    }

    .btn-verificar {
        background-color: #2196F3;
        color: white;
    }

    .btn-verificar:hover {
        background-color: #1976D2;
    }

    .cancha {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
    }
</style>
<body>
    <header>
        <h1>Reserva tu Cancha de Microfútbol</h1>
        <p>Elige entre nuestras canchas y asegura tu espacio de juego.</p>
    </header>

    @auth
    <!-- Mostrar solo si el usuario está autenticado -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-cerrar-sesion">Cerrar sesión</button>
    </form>
    @endauth

    <!-- Mostrar mensaje de éxito después de reservar -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="reservas">
        <!-- Bloque para la Cancha 1 -->
        <div class="cancha" data-cancha="1">
            <h2>Cancha Sintética 1</h2>

            <label for="hora-1">Hora de reserva:</label>
            <input type="time" id="hora-1" name="hora" min="08:00" max="22:00" required>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const timeInputs = document.querySelectorAll('input[type="time"]');
                    
                    timeInputs.forEach(function(input) {
                        input.addEventListener('focus', function() {
                            // Establecer un rango de horas exactas (9:00, 10:00, ..., 22:00)
                            let options = [];
                            for (let i = 8; i <= 22; i++) {
                                options.push(`${i < 10 ? '0' + i : i}:00`);
                            }
                            input.setAttribute('list', 'hora-list');
                            let datalist = document.createElement('datalist');
                            datalist.id = 'hora-list';
                            options.forEach(function(option) {
                                let optionElement = document.createElement('option');
                                optionElement.value = option;
                                datalist.appendChild(optionElement);
                            });
                            input.parentNode.appendChild(datalist);
                        });
                    });
                });
            </script>

            <input type="hidden" name="cancha_id" value="1"> <!-- ID de la cancha -->

            <button type="button" class="btn-verificar" onclick="verificarDisponibilidad(1)">Verificar Disponibilidad</button>
            <button type="button" class="btn-reservar" onclick="reservarCancha(1)">Reservar</button>
            <button type="button" class="btn-cancelar" onclick="cancelarReserva(1)">Cancelar Reserva</button>
        </div>

        <!-- Bloque para la Cancha 2 -->
        <div class="cancha" data-cancha="2">
            <h2>Cancha Sintética 2</h2>

            <label for="hora-2">Hora de reserva:</label>
            <input type="time" id="hora-2" name="hora" min="08:00" max="22:00" required>

            <input type="hidden" name="cancha_id" value="2"> <!-- ID de la cancha -->

            <button type="button" class="btn-verificar" onclick="verificarDisponibilidad(2)">Verificar Disponibilidad</button>
            <button type="button" class="btn-reservar" onclick="reservarCancha(2)">Reservar</button>
            <button type="button" class="btn-cancelar" onclick="cancelarReserva(2)">Cancelar Reserva</button>
        </div>

        <!-- Bloque para la Cancha 3 -->
        <div class="cancha" data-cancha="3">
            <h2>Cancha Sintética 3</h2>

            <label for="hora-3">Hora de reserva:</label>
            <input type="time" id="hora-3" name="hora" min="08:00" max="22:00" required>

            <input type="hidden" name="cancha_id" value="3"> <!-- ID de la cancha -->

            <button type="button" class="btn-verificar" onclick="verificarDisponibilidad(3)">Verificar Disponibilidad</button>
            <button type="button" class="btn-reservar" onclick="reservarCancha(3)">Reservar</button>
            <button type="button" class="btn-cancelar" onclick="cancelarReserva(3)">Cancelar Reserva</button>
        </div>
    </section>

    <script>
        async function verificarDisponibilidad(id) {
            const horaInput = document.getElementById(`hora-${id}`);
            const horaSeleccionada = horaInput.value;
    
            if (!horaSeleccionada) {
                alert("Por favor, ingresa una hora válida.");
                return;
            }
    
            const response = await fetch('/verificar-disponibilidad', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ hora: horaSeleccionada, cancha_id: id })
            });
    
            const data = await response.json();
            alert(data.mensaje);
        }
    
        async function reservarCancha(id) {
            const horaInput = document.getElementById(`hora-${id}`);
            const horaSeleccionada = horaInput.value;
    
            if (!horaSeleccionada) {
                alert("Por favor, ingresa una hora válida para reservar.");
                return;
            }
    
            const response = await fetch('/reservar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ hora: horaSeleccionada, cancha_id: id })
            });
    
            const data = await response.json();
            alert(data.mensaje);
        }
    
        async function cancelarReserva(id) {
            const horaInput = document.getElementById(`hora-${id}`);
            const horaSeleccionada = horaInput.value;
    
            if (!horaSeleccionada) {
                alert("Por favor, ingresa la hora de tu reserva para cancelarla.");
                return;
            }
    
            const response = await fetch('/cancelar-reserva', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ hora: horaSeleccionada, cancha_id: id })
            });
    
            const data = await response.json();
            alert(data.mensaje);
        }
    </script>
    
</body>
</html>
