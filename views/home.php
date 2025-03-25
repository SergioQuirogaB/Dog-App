<!DOCTYPE html>
<html>
<head>
    <title>Dog Walker App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Bienvenido a Dog Walker</h1>
            <p class="lead">Conectamos dueños de perros con paseadores confiables.</p>
            <hr class="my-4">
            <p>¿Necesitas un paseador para tu perro o quieres ofrecer tus servicios como paseador?</p>
            <div class="mt-4">
                <?php if (!isset($_SESSION['username'])): ?>
                    <a class="btn btn-primary btn-lg mr-3" href="login">Iniciar Sesión</a>
                    <a class="btn btn-success btn-lg" href="register">Registrarse</a>
                <?php else: ?>
                    <a class="btn btn-primary btn-lg" href="dashboard">Ir al Panel</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>