<?php
require_once 'models/Walk.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Debes iniciar sesión primero'];
    header('Location: login');
    exit();
}

if ($_SESSION['user_type'] != 'owner') {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Solo los dueños pueden solicitar paseos'];
    header('Location: dashboard');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $latitude = floatval($_POST['latitude']);
        $longitude = floatval($_POST['longitude']);
        $dog_details = $_POST['dog_details'];
        
        $walk = new Walk($db);
        if ($walk->createWalk($_SESSION['username'], $latitude, $longitude, $dog_details)) {
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Paseo solicitado exitosamente'];
            header('Location: dashboard');
            exit();
        }
    } catch(Exception $e) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Por favor proporciona ubicación válida'];
    }
}

require 'views/request_walk.php';
?>