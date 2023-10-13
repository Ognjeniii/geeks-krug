<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/resources/views/';

switch ($request) {
        // Default route
    case '':
    case '/':
        require __DIR__ . $viewDir . 'index.php';
        break;

        // Signup routes
    case '/signup':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=full_name':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=username':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=email':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=password':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=password_repeat':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=pass_not_match':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

        // Login routes
    case '/login':
        require __DIR__ . $viewDir . '/auth/login.php';
        break;

    case '/login?error=do_you_even_exists':
        require __DIR__ . $viewDir . '/auth/login.php';
        break;

    case '/test':
        require __DIR__ . $viewDir . '/test.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
