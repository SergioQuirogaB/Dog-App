<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Paseos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        .map-container {
            height: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Mis Paseos Aceptados</h2>
        
        <?php foreach ($user_walks as $walk): ?>
            <?php if ($walk['status'] == 'accepted'): ?>
                <div class="bg-white shadow-lg rounded-lg mb-6 p-6">
                    <h5 class="text-xl font-medium text-gray-700">Paseo #<?php echo $walk['id']; ?></h5>
                    <?php if ($_SESSION['user_type'] == 'owner'): ?>
                        <p class="text-gray-600 mt-2"><strong>Paseador:</strong> <?php echo htmlspecialchars($walk['walker']); ?></p>
                    <?php else: ?>
                        <p class="text-gray-600 mt-2"><strong>Dueño:</strong> <?php echo htmlspecialchars($walk['owner']); ?></p>
                    <?php endif; ?>
                    <div id="map-<?php echo $walk['id']; ?>" class="map-container mt-4"></div>
                    <p class="text-gray-600 mt-4"><strong>Detalles del perro:</strong> <?php echo htmlspecialchars($walk['dog_details']); ?></p>
                    <p class="text-info text-blue-500 mt-2 italic">Simulación del paseo en curso...</p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!array_filter($user_walks, function($walk) { return $walk['status'] == 'accepted'; })): ?>
            <div class="alert alert-info text-center text-gray-700 bg-blue-100 p-4 rounded-lg">
                No tienes paseos aceptados en este momento.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const dogIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
            iconSize: [30, 45],  // Icono más grande para mejor visibilidad
            iconAnchor: [15, 45],
            popupAnchor: [1, -40]
        });

        const maps = {};
        const markers = {};
        
        <?php foreach ($user_walks as $walk): ?>
            <?php if ($walk['status'] == 'accepted'): ?>
                const map<?php echo $walk['id']; ?> = L.map('map-<?php echo $walk['id']; ?>')
                    .setView([<?php echo $walk['latitude']; ?>, <?php echo $walk['longitude']; ?>], 15);
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map<?php echo $walk['id']; ?>);

                markers[<?php echo $walk['id']; ?>] = L.marker(
                    [<?php echo $walk['latitude']; ?>, <?php echo $walk['longitude']; ?>],
                    {icon: dogIcon}
                ).addTo(map<?php echo $walk['id']; ?>);

                maps[<?php echo $walk['id']; ?>] = map<?php echo $walk['id']; ?>;
                
                // Start simulation automatically
                simulateWalk(<?php echo $walk['id']; ?>);
            <?php endif; ?>
        <?php endforeach; ?>

        function simulateWalk(walkId) {
            const map = maps[walkId];
            const marker = markers[walkId];
            const center = map.getCenter();
            
            // Larger radius for a bigger path
            const radius = 0.003;
            // More points for smoother movement
            const points = 100;
            const path = [];
            
            // Create a more complex path (figure-eight pattern)
            for (let i = 0; i <= points; i++) {
                const t = (i / points) * 2 * Math.PI;
                const lat = center.lat + radius * Math.sin(t);
                const lng = center.lng + radius * Math.sin(t * 2);
                path.push([lat, lng]);
            }

            let currentPoint = 0;
            
            function animate() {
                if (currentPoint >= path.length) {
                    currentPoint = 0;
                }
                
                marker.setLatLng(path[currentPoint]);
                currentPoint++;
                
                // Slower animation (1000ms = 1 second between points)
                setTimeout(animate, 1000);
            }
            
            animate();
        }
    </script>
</body>
</html>
