<?php
session_start();
require_once 'config/database.php';

// Obtener la ruta actual
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/App';
$request = str_replace($base_path, '', $request_uri);
$request = strtok($request, '?');

// Enrutamiento
switch ($request) {
    case '/' :
    case '':
        require 'views/home.php';
        break;
        
    case '/login':
        require 'controllers/login.php';
        break;
        
    case '/register':
        require 'controllers/register.php';
        break;
        
    case '/dashboard':
        require 'controllers/dashboard.php';
        break;
        
    case '/request-walk':
        require 'controllers/request_walk.php';
        break;
        
    case '/my-walks':
        require 'controllers/my_walks.php';
        break;
        
    case '/logout':
        session_destroy();
        header('Location: ' . $base_path);
        exit();
        break;
        
    default:
        if (preg_match('/^\/accept-walk\/(\d+)$/', $request, $matches)) {
            $_GET['id'] = $matches[1];
            require 'controllers/accept_walk.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            require 'views/404.php';
        }
        break;
}
?>