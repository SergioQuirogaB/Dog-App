<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Vincular Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg bg-opacity-80">
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

</body>
</html>
