<!DOCTYPE html>
<html>
<head>
    <title>Mis Paseos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        .map-container {
            height: 400px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Mis Paseos Aceptados</h2>
        
        <?php foreach ($user_walks as $walk): ?>
            <?php if ($walk['status'] == 'accepted'): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Paseo #<?php echo $walk['id']; ?></h5>
                        <?php if ($_SESSION['user_type'] == 'owner'): ?>
                            <p>Paseador: <?php echo htmlspecialchars($walk['walker']); ?></p>
                        <?php else: ?>
                            <p>Dueño: <?php echo htmlspecialchars($walk['owner']); ?></p>
                        <?php endif; ?>
                        <div id="map-<?php echo $walk['id']; ?>" class="map-container"></div>
                        <p>Detalles del perro: <?php echo htmlspecialchars($walk['dog_details']); ?></p>
                        <p class="text-info">Simulación del paseo en curso...</p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!array_filter($user_walks, function($walk) { return $walk['status'] == 'accepted'; })): ?>
            <div class="alert alert-info">
                No tienes paseos aceptados en este momento.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const dogIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
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