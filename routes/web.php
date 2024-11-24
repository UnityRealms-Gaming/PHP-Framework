<?php

use App\Controllers\AdminController;
use /**
 * The View class is responsible for rendering templates and managing view data.
 *
 * It allows setting variables that can be used within the templates,
 * rendering templates with the set data, and checking for the existence of templates.
 */
    App\Core\View;
use /**
 * Manages Authentication Middleware for HTTP requests.
 *
 * This middleware class checks if a user is authenticated before allowing them
 * to access specific routes. If the user is not authenticated, it redirects
 * them to a login page or returns an error response.
 */
    App\Middleware\AuthMiddleware;
use App\Middleware\LicenseMiddleware;
use App\Middleware\PermissionMiddleware;
use App\Middleware\RoleMiddleware;
use /**
 * The User model class.
 *
 * Represents a user in the application.
 */
    App\Models\User;
use /**
 * The Auth class is responsible for handling user authentication within the application.
 * It provides methods to login, logout, and verify authentication status.
 */
    App\Core\Auth;
use /**
 * The AuthController class handles the authentication-related actions within the application.
 *
 * Responsibilities include:
 * - Logging users in
 * - Logging users out
 * - Registering new users
 * - Password reset and recovery
 * - Verifying user identities
 *
 * This class interacts with the authentication mechanisms and underlying user model to perform
 * the necessary operations for managing user authentication states.
 */
    App\Controllers\AuthController;

/**
 * The $authController variable is an instance of the AuthController class.
 * It is responsible for handling user authentication processes such as login,
 * registration, password recovery, and logout. The AuthController interacts
 * with the authentication services and manages session data to maintain
 * and verify user credentials.
 *
 * Typical responsibilities include:
 * - Validating user credentials
 * - Creating and managing user sessions
 * - Handling user registration and data validation
 * - Managing password recovery mechanisms
 * - Ensuring secure logout processes
 */



$authController = new AuthController();

// **Home Route** (Named Route: 'home')
$router->get('/', function () {
    $view = new View();
    echo $view->render('home');
}, 'home');

// Definiere deine Routen und Middleware
$router->get('/auth/register', 'AuthController@showRegisterForm', 'auth.register');
$router->post('/auth/register', 'AuthController@register', 'auth.register.process');
$router->get('/auth/login', 'AuthController@showLoginForm', 'auth.login');
$router->post('/auth/login', 'AuthController@login', 'auth.login.process');
$router->get('/auth/logout', 'AuthController@logout', 'auth.logout');

// Admin-Routen (geschützt durch AuthMiddleware)
$router->group('/admin', function ($router) {
    $router->get('/dashboard', 'AdminController@dashboard', 'admin.dashboard', [new RoleMiddleware('admin')]);
}, [new AuthMiddleware()]);

