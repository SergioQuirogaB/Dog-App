<?php
require_once 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $user = new User($db);
    
    try {
        if ($user->register($username, $password, $user_type)) {
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Registro exitoso'];
            header('Location: login');
        }
    } catch(PDOException $e) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'El usuario ya existe'];
    }
}

require 'views/register.php';
?>