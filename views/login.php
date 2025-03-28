<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Incluir Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        body {
            background-color: transparent !important;
        }
    </style>
</head>
<body class="bg-transparent">

    <!-- Fondo de partículas (solo en JS) -->
    <div id="particles-js"></div>

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-white bg-opacity-90 rounded-xl shadow-lg relative z-10">
            <h2 class="text-3xl font-extrabold text-center text-sky-500 mb-6">Iniciar Sesión</h2>
            
            <!-- Mensaje Flash -->
            <?php if (isset($_SESSION['flash'])): ?>
                <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?> text-center text-white mb-4 px-4 py-2 rounded-md bg-<?php echo $_SESSION['flash']['type']; ?>">
                    <?php 
                        echo $_SESSION['flash']['message'];
                        unset($_SESSION['flash']);
                    ?>
                </div>
            <?php endif; ?>

            <!-- Formulario -->
            <form method="POST" action="login">
                <div class="mb-4">
                    <label for="username" class="block text-lg font-medium text-gray-700">Usuario</label>
                    <input type="text" name="username" id="username" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-lg font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full py-3 px-6 bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-sky-500 hover:to-indigo-500 text-white font-semibold rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">Iniciar Sesión</button>
            </form>

            <p class="mt-4 text-center text-gray-600">¿No tienes cuenta? <a href="register" class="text-blue-600 hover:underline">Regístrate</a></p>
        </div>
    </div>

    <!-- Configuración de Particles.js en JS -->
    <script>
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 120, // Increased number of particles
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#3b82f6' // Brighter blue
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#3b82f6'
                    }
                },
                opacity: {
                    value: 0.7, // Increased opacity
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.3,
                        sync: false
                    }
                },
                size: {
                    value: 4, // Slightly larger particles
                    random: true,
                    anim: {
                        enable: true,
                        speed: 20,
                        size_min: 0.5,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#3b82f6',
                    opacity: 0.6, // Increased line opacity
                    width: 1.5
                },
                move: {
                    enable: true,
                    speed: 4, // Slightly faster movement
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    repulse: {
                        distance: 100,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    }
                }
            },
            retina_detect: true
        });
    </script>

</body>
</html>