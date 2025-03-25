<?php
require_once 'models/Walk.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Debes iniciar sesión primero'];
    header('Location: /App/login');
    exit();
}

if ($_SESSION['user_type'] != 'walker') {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Solo los paseadores pueden aceptar paseos'];
    header('Location: /App/dashboard');
    exit();
}

$walk_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($walk_id > 0) {
    $walk = new Walk($db);
    try {
        if ($walk->acceptWalk($walk_id, $_SESSION['username'])) {
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Paseo aceptado exitosamente'];
        } else {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'No se pudo aceptar el paseo'];
        }
    } catch(Exception $e) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Error al aceptar el paseo'];
    }
} else {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Paseo no encontrado'];
}

header('Location: /App/dashboard');
exit();
?>