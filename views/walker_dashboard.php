<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Paseador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            '50': '#f0fdf4',
                            '100': '#dcfce7',
                            '500': '#22c55e',
                            '600': '#16a34a',
                        },
                        'secondary': {
                            '50': '#f0f9ff',
                            '100': '#e0f2fe',
                            '500': '#0ea5e9',
                            '600': '#0284c7',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-0">
                    Bienvenido Paseador, 
                    <span class="text-primary-500"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </h2>
                
                <div class="flex space-x-3">
                    <a href="my-walks" class="px-4 py-2 sm:px-6 sm:py-3 bg-secondary-500 text-white font-semibold rounded-lg hover:bg-secondary-600 transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        Mis Paseos
                    </a>
                    <a href="logout" class="px-4 py-2 sm:px-6 sm:py-3 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Salir
                    </a>
                </div>
            </div>

            <?php if (isset($_SESSION['flash'])): ?>
                <div class="<?php 
                    echo $_SESSION['flash']['type'] === 'success' ? 'bg-green-100 text-green-800' : 
                         ($_SESSION['flash']['type'] === 'danger' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800'); 
                    ?> p-4 rounded-lg text-center mb-6">
                    <?php 
                        echo htmlspecialchars($_SESSION['flash']['message']);
                        unset($_SESSION['flash']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="border-t border-gray-200 pt-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Paseos Disponibles</h3>
                
                <?php if (empty($available_walks)): ?>
                    <div class="text-center bg-gray-100 p-8 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-600 text-lg">No hay paseos disponibles por el momento</p>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($available_walks as $walk): ?>
                            <?php if ($walk['status'] == 'pending'): ?>
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                    <div class="flex justify-between items-center mb-4">
                                        <h4 class="text-xl font-bold text-gray-800">Paseo #<?php echo $walk['id']; ?></h4>
                                        <span class="bg-primary-100 text-primary-500 px-3 py-1 rounded-full text-xs font-medium">
                                            Pendiente
                                        </span>
                                    </div>
                                    
                                    <div class="space-y-3 text-gray-600 mb-4">
                                        <p>
                                            <strong>Dueño:</strong> 
                                            <?php echo htmlspecialchars($walk['owner']); ?>
                                        </p>
                                        <p>
                                            <strong>Detalles del perro:</strong> 
                                            <?php echo htmlspecialchars($walk['dog_details']); ?>
                                        </p>
                                        <p>
                                            <strong>Ubicación:</strong> 
                                            <a 
                                                href="https://maps.google.com/?q=<?php echo $walk['latitude']; ?>,<?php echo $walk['longitude']; ?>" 
                                                target="_blank" 
                                                class="text-secondary-500 hover:underline"
                                            >
                                                Ver en mapa
                                            </a>
                                        </p>
                                        <p>
                                            <strong>Fecha:</strong> 
                                            <?php echo $walk['created_at']; ?>
                                        </p>
                                    </div>
                                    
                                    <a href="#" onclick="acceptWalk(<?php echo $walk['id']; ?>); return false;" 
   class="w-full block text-center px-6 py-3 bg-primary-500 text-white font-semibold rounded-lg hover:bg-primary-600 transition-colors"
>
    Aceptar Paseo
</a>

                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
function acceptWalk(walkId) {
    fetch(`/accept-walk/${walkId}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: '¡Paseo Aceptado!',
                text: data.message,
                confirmButtonText: 'Aceptar'
            }).then(() => {
                // Opcional: recargar la página o actualizar la lista de paseos
                location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message,
                confirmButtonText: 'Aceptar'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema al aceptar el paseo',
            confirmButtonText: 'Aceptar'
        });
    });
}
</script>
</body>
</html>