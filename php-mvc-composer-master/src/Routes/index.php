<?php

use App\Controllers\HomeController;
use App\Controllers\UsuarioController;
use App\Router;

$router = new Router();
//Home
$router->get('/', HomeController::class, 'index');
//Usuario
$router->get('/Usuario', UsuarioController::class, 'index');
$router->get('/Usuario/Nuevo', UsuarioController::class, 'Nuevo');
$router->post('/Usuario/Nuevo', UsuarioController::class, 'Nuevo');
$router->get('/Usuario/Editar', UsuarioController::class, 'Editar');
$router->post('/Usuario/Editar', UsuarioController::class, 'Editar');
$router->get('/Usuario/Eliminar', UsuarioController::class, 'Eliminar'); 
$router->get('/Usuario/API', UsuarioController::class, 'apiIndex');

$router->dispatch();
