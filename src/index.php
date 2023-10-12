<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/resources/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'index.php';
        break;

    case '/signup':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/login':
        require __DIR__ . $viewDir . '/auth/login.php';
        break;

    case '/test':
        require __DIR__ . $viewDir . '/test.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
