<?php
require_once 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new User($db);
    $logged_user = $user->login($username, $password);
    
    if ($logged_user) {
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $logged_user['user_type'];
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Inicio de sesión exitoso'];
        header('Location: dashboard');
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Usuario o contraseña incorrectos'];
    }
}

require 'views/login.php';
?>