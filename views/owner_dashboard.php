<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Dueño</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        'xs': '375px', // iPhone SE width
                        'sm': '640px',
                        'md': '768px',
                        'lg': '1024px',
                        'xl': '1280px'
                    },
                    colors: {
                        'primary': '#3B82F6',
                        'secondary': '#6366F1',
                        'danger': '#EF4444'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen py-4 sm:py-8 px-4">
    <div class="w-full max-w-xl mx-auto bg-white sm:shadow-md sm:rounded-xl sm:p-6 p-4 space-y-6">
        <div class="text-center">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">
                Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>
            </h2>
            <p class="text-sm sm:text-base text-gray-600 mb-4">Panel de Control de Paseos</p>
        </div>

        <?php if (isset($_SESSION['flash'])): ?>
            <div class="<?php 
                echo $_SESSION['flash']['type'] === 'success' ? 'bg-green-100 text-green-800' : 
                     ($_SESSION['flash']['type'] === 'danger' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800'); 
                ?> p-3 sm:p-4 rounded-lg mb-4 text-center text-sm sm:text-base">
                <?php 
                    echo htmlspecialchars($_SESSION['flash']['message']);
                    unset($_SESSION['flash']);
                ?>
            </div>
        <?php endif; ?>
        
        <div class="grid grid-cols-3 gap-2 sm:gap-4 mb-6">
            <a href="request-walk" class="bg-primary text-white py-2 px-2 sm:px-3 rounded-lg text-xs sm:text-sm text-center hover:bg-blue-700 transition duration-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nuevo Paseo
            </a>
            <a href="my-walks" class="bg-secondary text-white py-2 px-2 sm:px-3 rounded-lg text-xs sm:text-sm text-center hover:bg-indigo-700 transition duration-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                Mis Paseos
            </a>
            <a href="logout" class="bg-danger text-white py-2 px-2 sm:px-3 rounded-lg text-xs sm:text-sm text-center hover:bg-red-700 transition duration-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Salir
            </a>
        </div>

        <div>
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Mis Paseos Pendientes</h3>
            <?php if (empty($available_walks)): ?>
                <div class="text-center text-gray-500 bg-gray-100 p-3 sm:p-4 rounded-lg text-sm sm:text-base">
                    No tienes paseos pendientes
                </div>
            <?php else: ?>
                <div class="space-y-3 sm:space-y-4">
                    <?php foreach ($available_walks as $walk): ?>
                        <?php if ($walk['owner'] == $_SESSION['username']): ?>
                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200 hover:bg-gray-100 transition duration-300">
                                <div class="flex justify-between items-center mb-2">
                                    <h5 class="text-base sm:text-lg font-medium text-gray-800">Paseo #<?php echo $walk['id']; ?></h5>
                                    <span class="<?php 
                                        echo $walk['status'] === 'Pendiente' ? 'bg-yellow-100 text-yellow-800' : 
                                             ($walk['status'] === 'Completado' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800');
                                        ?> px-2 py-1 rounded-full text-xs">
                                        <?php 
                                            // Aquí cambiamos el estado de inglés a español
                                            if ($walk['status'] == 'Pending') {
                                                echo 'Pendiente';
                                            } elseif ($walk['status'] == 'Completed') {
                                                echo 'Completado';
                                            } else {
                                                echo 'En progreso';
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="text-xs sm:text-sm text-gray-600 space-y-1">
                                    <p><strong>Detalles del perro:</strong> <?php echo htmlspecialchars($walk['dog_details']); ?></p>
                                    <p><strong>Fecha:</strong> <?php echo $walk['created_at']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
