<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Registro</h2>
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                <?php 
                    echo $_SESSION['flash']['message'];
                    unset($_SESSION['flash']);
                ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="register">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tipo de Usuario</label>
                <select name="user_type" class="form-control" required>
                    <option value="owner">Dueño de Perro</option>
                    <option value="walker">Paseador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <p class="mt-3">¿Ya tienes cuenta? <a href="login">Inicia sesión</a></p>
    </div>
</body>
</html>