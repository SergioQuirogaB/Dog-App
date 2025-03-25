<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                <?php 
                    echo $_SESSION['flash']['message'];
                    unset($_SESSION['flash']);
                ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="login">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <p class="mt-3">¿No tienes cuenta? <a href="register">Regístrate</a></p>
    </div>
</body>
</html>