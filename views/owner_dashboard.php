<!DOCTYPE html>
<html>
<head>
    <title>Panel de Control - Dueño</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                <?php 
                    echo $_SESSION['flash']['message'];
                    unset($_SESSION['flash']);
                ?>
            </div>
        <?php endif; ?>
        
        <div class="row mt-4">
            <div class="col">
                <a href="request-walk" class="btn btn-primary">Solicitar Nuevo Paseo</a>
                <a href="my-walks" class="btn btn-info">Mis Paseos</a>
                <a href="logout" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>

        <h3 class="mt-4">Mis Paseos Pendientes</h3>
        <div class="row mt-3">
            <?php foreach ($available_walks as $walk): ?>
                <?php if ($walk['owner'] == $_SESSION['username']): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Paseo #<?php echo $walk['id']; ?></h5>
                                <p>Detalles del perro: <?php echo htmlspecialchars($walk['dog_details']); ?></p>
                                <p>Estado: <?php echo $walk['status']; ?></p>
                                <p>Fecha: <?php echo $walk['created_at']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>