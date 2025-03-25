<?php
require_once 'models/Walk.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Debes iniciar sesión primero'];
    header('Location: login');
    exit();
}

$walk = new Walk($db);
$user_walks = $walk->getUserWalks($_SESSION['username'], $_SESSION['user_type']);

require 'views/my_walks.php';
?>