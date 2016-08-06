<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('Home', new Route('/', array('_controller' => 'Elham\\Controller\\HomeController::index')));
$routes->add('H', new Route('/user', array('_controller' => 'Elham\\Controller\\HomeController::getAllUser')));

return $routes;