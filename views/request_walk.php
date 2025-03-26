<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Paseo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map { 
            height: 300px; 
            width: 100%; 
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-6 px-4">
    <div class="w-full max-w-xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6">
        <div class="text-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Solicitar Nuevo Paseo</h2>
            <p class="text-gray-600">Selecciona la ubicación para el paseo de tu perro</p>
        </div>

        <?php if (isset($_SESSION['flash'])): ?>
            <div class="<?php 
                echo $_SESSION['flash']['type'] === 'success' ? 'bg-green-100 text-green-800' : 
                     ($_SESSION['flash']['type'] === 'danger' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800'); 
                ?> p-4 rounded-lg mb-4 text-center">
                <?php 
                    echo htmlspecialchars($_SESSION['flash']['message']);
                    unset($_SESSION['flash']);
                ?>
            </div>
        <?php endif; ?>
        
        <div id="map" class="rounded-lg shadow-sm border border-gray-200 mb-4"></div>
        
        <form method="POST" action="request-walk" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="dog-details">
                    Detalles del Perro
                </label>
                <textarea 
                    name="dog_details" 
                    id="dog-details"
                    rows="4"
                    class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Raza, edad, características especiales..."
                    required
                ></textarea>
            </div>

            <input type="hidden" name="latitude" id="latitude" required>
            <input type="hidden" name="longitude" id="longitude" required>
            
            <div id="selected-location" class="bg-blue-100 text-blue-800 p-3 rounded-lg text-center">
                Selecciona una ubicación en el mapa
            </div>

            <div class="flex space-x-4">
                <button 
                    type="submit" 
                    class="flex-1 bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Solicitar Paseo
                </button>
                <a 
                    href="dashboard" 
                    class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg hover:bg-gray-300 transition duration-300 flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                    </svg>
                    Volver
                </a>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Coordenadas de Bogotá
        const bogota = [4.6097, -74.0817];
        
        // Inicializar el mapa
        const map = L.map('map').setView(bogota, 12);
        
        // Agregar capa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker;

        // Manejar clicks en el mapa
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            // Remover marcador anterior si existe
            if (marker) {
                map.removeLayer(marker);
            }

            // Agregar nuevo marcador
            marker = L.marker([lat, lng]).addTo(map);

            // Actualizar formulario
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            document.getElementById('selected-location').innerHTML = 
                'Ubicación seleccionada: ' + lat.toFixed(6) + ', ' + lng.toFixed(6);
            document.getElementById('selected-location').classList.remove('bg-blue-100', 'text-blue-800');
            document.getElementById('selected-location').classList.add('bg-green-100', 'text-green-800');
        });

        // Restringir vista a Bogotá
        const bounds = L.latLngBounds(
            [4.471, -74.223], // Esquina suroeste
            [4.836, -74.023]  // Esquina noreste
        );
        map.setMaxBounds(bounds);
        map.on('drag', function() {
            map.panInsideBounds(bounds, { animate: false });
        });
    </script>
</body>
</html>