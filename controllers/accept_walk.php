<?php
require_once 'models/Walk.php';

// Asegúrate de que sea una solicitud AJAX
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('HTTP/1.1 403 Forbidden');
    exit();
}

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    echo json_encode([
        'success' => false, 
        'message' => 'Debes iniciar sesión primero'
    ]);
    exit();
}

if ($_SESSION['user_type'] != 'walker') {
    echo json_encode([
        'success' => false, 
        'message' => 'Solo los paseadores pueden aceptar paseos'
    ]);
    exit();
}

$walk_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($walk_id > 0) {
    $walk = new Walk($db);
    try {
        if ($walk->acceptWalk($walk_id, $_SESSION['username'])) {
            echo json_encode([
                'success' => true, 
                'message' => 'Paseo aceptado exitosamente'
            ]);
        } else {
            echo json_encode([
                'success' => false, 
                'message' => 'No se pudo aceptar el paseo'
            ]);
        }
    } catch(Exception $e) {
        echo json_encode([
            'success' => false, 
            'message' => 'Error al aceptar el paseo'
        ]);
    }
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Paseo no encontrado'
    ]);
}
exit();
?>