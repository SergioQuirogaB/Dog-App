<!DOCTYPE html>
<html>
<head>
    <title>Solicitar Paseo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Solicitar Nuevo Paseo</h2>
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                <?php 
                    echo $_SESSION['flash']['message'];
                    unset($_SESSION['flash']);
                ?>
            </div>
        <?php endif; ?>
        
        <div id="map"></div>
        
        <form method="POST" action="request-walk">
            <div class="form-group">
                <label>Detalles del Perro</label>
                <textarea name="dog_details" class="form-control" required 
                    placeholder="Raza, edad, características especiales..."></textarea>
            </div>
            <input type="hidden" name="latitude" id="latitude" required>
            <input type="hidden" name="longitude" id="longitude" required>
            <p id="selected-location" class="alert alert-info">Selecciona una ubicación en el mapa</p>
            <button type="submit" class="btn btn-primary">Solicitar Paseo</button>
            <a href="dashboard" class="btn btn-secondary">Volver</a>
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