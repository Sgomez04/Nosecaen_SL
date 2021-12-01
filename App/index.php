<?php
// Estamos trabajando con espacios de nombres, hay objetos que queremos simplificar su nombre
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Autocargador para los componentes instalados desde composer (en este caso Slim)
require __DIR__ . '/vendor/autoload.php'; 

// definimos constantes que facilitan el trabajo
require __DIR__.'/ctes.php';


// URL en la que se encuentra la aplicación. Se precisa para crear los enlaces
// BASE_URL si utilizáis XAMMP será 
// http://localhost/carpeta/index.php/

define('BASE_URL', 'http://localhost/PHP/NoSeCaenSL/App/index.php/');
define('ASSETS_URL', 'http://localhost/PHP/NoSeCaenSL/Assets/');


// Habilitamos errores detallados para que nos informe de cualquier contratiempo
// https://www.slimframework.com/docs/v3/handlers/error.html
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

//Incluimos la conexion a la DB y el controlador de la tarea
include (MODEL_PATH.'class/connection_db.php');
include (CTRL_PATH.'taskController.php');


/**
 * Instantiate App
 * Creamos la aplicación
 */

$app = new \Slim\App($configuration);


// Define app routes

// Página principal
$app->any('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write(TaskController::getInstance()->Inicio() );
    return $response;
});

// Listar
$app->any('/list', function (Request $request, Response $response, $args) {
    $response->getBody()->write(TaskController::getInstance()->Inicio() );
    return $response;
});

// Formulario Tarea
$app->any('/form', function (Request $request, Response $response, $args) {
    $response->getBody()->write(TaskController::getInstance()->Formulario() );
    return $response;
});


// Alta - Modificacion
$app->any('/add', function (Request $request, Response $response, $args) {
    $response->getBody()->write(TaskController::getInstance()->Guardar() );
    return $response;
});

// $app->any('/update', function (Request $request, Response $response, $args) {
//     $response->getBody()->write(TaskController::getInstance()->Modificar() );
//     return $response;
// });

// Borrar //

//confirmar borrado
$app->any('/cdel', function (Request $request, Response $response, $args) {
    $response->getBody()->write(TaskController::getInstance()->cEliminar() );
    return $response;
});

//eliminar
$app->any('/del', function (Request $request, Response $response, $args) {
    $response->getBody()->write(TaskController::getInstance()->Eliminar() );
    return $response;
});

// Run app
$app->run();



// include_once 'models/class/connection_db.php';

// $controller = 'task';

// // Todo esta lógica hara el papel de un FrontController
// if(!isset($_REQUEST['c']))
// {
//     require_once "controller/$controller"."controller.php";
//     $controller = ucwords($controller) . 'Controller';
//     $controller = new $controller;
//     $controller->Index();    
// }
// else
// {
//     // Obtenemos el controlador que queremos cargar
//     $controller = strtolower($_REQUEST['c']);
//     $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
//     // Instanciamos el controlador
//     require_once "controller/$controller"."controller.php";
//     $controller = ucwords($controller) . 'Controller';
//     $controller = new $controller;
    
//     // Llama la accion
//     call_user_func(array( $controller, $accion ) );
// }
