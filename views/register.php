<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Vincular Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Incluir particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        /* Asegurarse que el fondo de particles.js cubra toda la pantalla */
        #particles-js {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Esto asegura que los particles estén detrás del contenido */
        }

        /* El fondo del body y html será transparente */
        html, body {
            height: 100%; /* Asegura que el body y html ocupen toda la pantalla */
            margin: 0;
            background: transparent; /* Fondo transparente */
        }
    </style>
</head>
<body>

    <!-- Contenedor de partículas -->
    <div id="particles-js"></div>

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
            <h2 class="text-3xl font-extrabold text-center text-blue-600 mb-6">Registro</h2>

            <!-- Mensaje Flash -->
            <?php if (isset($_SESSION['flash'])): ?>
                <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?> text-center text-white mb-4 px-4 py-2 rounded-md bg-<?php echo $_SESSION['flash']['type']; ?>">
                    <?php 
                        echo $_SESSION['flash']['message'];
                        unset($_SESSION['flash']);
                    ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de Registro -->
            <form method="POST" action="register">
                <div class="mb-4">
                    <label for="username" class="block text-lg font-medium text-gray-700">Usuario</label>
                    <input type="text" name="username" id="username" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-lg font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="user_type" class="block text-lg font-medium text-gray-700">Tipo de Usuario</label>
                    <select name="user_type" id="user_type" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="owner">Dueño de Perro</option>
                        <option value="walker">Paseador</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-3 px-6 bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">Registrar</button>
            </form>

            <p class="mt-4 text-center text-gray-600">¿Ya tienes cuenta? <a href="login" class="text-blue-600 hover:underline">Inicia sesión</a></p>
        </div>
    </div>

    <!-- Inicializar particles.js -->
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#3b82f6"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#3b82f6"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#3b82f6",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                }
            },
            "retina_detect": true
        });
    </script>

</body>
</html>
