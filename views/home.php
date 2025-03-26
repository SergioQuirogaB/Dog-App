<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Walker App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fondo con huellas de perrito sutil */
        .bg-dog {
            background-image: url('https://www.transparenttextures.com/patterns/dogtooth.png'), 
                              radial-gradient(circle, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.3) 70%);
            background-size: contain, cover;
            background-position: center, center;
            background-repeat: repeat, no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="bg-dog min-h-screen flex items-center justify-center bg-cover text-white py-8 px-4">
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

</body>
</html>
