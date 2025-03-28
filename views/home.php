<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Walker App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }
        body {
            background-color: transparent !important;
        }
    </style>
</head>
<body class="bg-transparent relative">
    <div id="particles-js"></div>

    <div class="bg-dog min-h-screen flex items-center justify-center bg-cover text-white py-8 px-4 relative z-10">
        <div class="w-full max-w-md mx-auto p-6 bg-white bg-opacity-80 rounded-xl shadow-lg transform hover:scale-105 transition-all duration-300">

            <!-- Logo centrado en la parte superior -->
            <div class="text-center mb-6">
                <img src="../assets/imgs/icono.png" alt="Logo FURRY'SS" class="w-32 mx-auto mb-4">
            </div>

            <!-- Título -->
            <div class="border-t border-gray-300 mt-4 mb-6"></div>
            
            <!-- Botones de acción -->
            <div class="flex flex-col sm:flex-row sm:space-x-4 justify-center items-center space-y-4 sm:space-y-0">
                <?php if (!isset($_SESSION['username'])): ?>
                    <a href="login" class="w-full sm:w-auto py-3 px-6 bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-sky-500 hover:to-indigo-500 text-white text-xl font-semibold rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 text-center">Iniciar Sesión</a>
                    <a href="register" class="w-full sm:w-auto py-3 px-6 bg-gradient-to-r from-blue-400 to-sky-500 hover:from-blue-500 hover:to-sky-400 text-white text-xl font-semibold rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 text-center">Registrarse</a>
                <?php else: ?>
                    <a href="dashboard" class="w-full sm:w-auto py-3 px-6 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-cyan-500 hover:to-blue-500 text-white text-xl font-semibold rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 text-center">Ir al Panel</a>
                <?php endif; ?>
            </div><br>

            <!-- Botón de Ver Productos en una nueva línea -->
            <div class="mt-4 text-center">
                <a href="catalog" class="w-full sm:w-auto py-3 px-6 bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-sky-500 hover:to-indigo-500 text-white text-xl font-semibold rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 text-center">Ver Productos</a>
            </div>

        </div>
    </div>

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
                    value: '#3b82f6' // Brighter blue from Tailwind
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