<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('Home', new Route('/', array('_controller' => 'Elham\\Controller\\HomeController::index')));
$routes->add('H', new Route('/user', array('_controller' => 'Elham\\Controller\\HomeController::getAllUser')));
$routes->add('User', new Route('/user/create', array('_controller' => 'Elham\\Controller\\HomeController::create')));
$routes->add('UserStore', new Route('/user/store', array('_controller' => 'Elham\\Controller\\HomeController::store')));
$routes->add('UserShow', new Route('/user/show', array('_controller' => 'Elham\\Controller\\HomeController::show')));
$routes->add('UserEdit', new Route('/user/{id}', array('_controller' => 'Elham\\Controller\\HomeController::edit')));
$routes->add('UserUpdate', new Route('/user/{id}/update', array('_controller' => 'Elham\\Controller\\HomeController::update')));
$routes->add('UserDelete', new Route('/user/{id}/delete', array('_controller' => 'Elham\\Controller\\HomeController::delete')));
return $routes;