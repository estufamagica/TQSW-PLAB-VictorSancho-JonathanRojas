<?php
require_once('./vendor/autoload.php');
session_start();

$request = $_GET['action'] ?? null;

switch ($request) {
    case '':
        require __DIR__ . '/src/Resources/homepage.php';
        break;
    case 'login' :
        require __DIR__ . '/src/Resources/login.php';
        break;
    case 'logout' :
        require __DIR__ . '/src/Resources/logout.php';
        break;
    case 'register' :
        require __DIR__ . '/src/Resources/register.php';
        break;
    case 'createPost' :
        require __DIR__ . '/src/Resources/post.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/Resources/404.php';
        break;
}