<?php
require_once 'models/Walk.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Debes iniciar sesión primero'];
    header('Location: /App/login');  // Usa ruta absoluta
    exit();
}

$walk = new Walk($db);
$available_walks = $walk->getWalks();

if ($_SESSION['user_type'] == 'owner') {
    require 'views/owner_dashboard.php';
} else {
    require 'views/walker_dashboard.php';
}
?>