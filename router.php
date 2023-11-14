<?php
    require_once 'libs/router.php';
    require_once 'controller/ApiController.php';


    //Crea el router
    $router = new Router();

    //Tabla de ruteo
    $router->addRoute('games', 'GET', 'ApiController', 'getGames');   //Obtener Juegos
    $router->addRoute('games/:ATTR', 'GET', 'ApiController', 'getGames'); //Obtener Juegos en orden ascendente
    $router->addRoute('games/:ID', 'GET', 'ApiController', 'getGame'); //Obtener 1 juego
    $router->addRoute('games/:ID', 'DELETE', 'ApiController', 'deleteGame'); //Borrar Juego
    $router->addRoute('games', 'POST', 'ApiController', 'addGame'); //Agregar Juego
    $router->addRoute('games/:ID', 'PUT', 'ApiController', 'editGame'); //Modificar un juego
    

    //routea
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>