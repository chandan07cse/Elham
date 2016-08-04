<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

// Controller converted into the class
$routes = new RouteCollection();
$routes->add('Home', new Route('/', array('_controller' => 'Elham\\Controller\\HomeController::index')));
$routes->add('H', new Route('/user', array('_controller' => 'Elham\\Controller\\HomeController::getAllUser')));

return $routes;