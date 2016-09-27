<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
//home routes
$routes->add('Home', new Route('/', array('_controller' => 'Elham\\Controller\\HomeController::index')));
//registration routes
$routes->add('RegistrationView', new Route('/user/create', array('_controller' => 'Elham\\Controller\\RegistrationController::create')));
$routes->add('UserStore', new Route('/user/store', array('_controller' => 'Elham\\Controller\\RegistrationController::store')));
$routes->add('UserActivate', new Route('/user/activate/{mail}/{token}', array('_controller' => 'Elham\\Controller\\RegistrationController::verification')));
//login routes
$routes->add('SignIn', new Route('/user/login', array('_controller' => 'Elham\\Controller\\LoginController::index')));
$routes->add('LoginFunction', new Route('/user/login/post', array('_controller' => 'Elham\\Controller\\LoginController::login')));
$routes->add('LoginOutFunction', new Route('/user/logout', array('_controller' => 'Elham\\Controller\\LoginController::logout')));
//User Dashboard
$routes->add('UserDashboard', new Route('/user/dashboard', array('_controller' => 'Elham\\Controller\\UsersController::index')));
$routes->add('UserProfile', new Route('/user/{id}', array('_controller' => 'Elham\\Controller\\UsersController::edit')));
$routes->add('UserUpdate', new Route('/user/{id}/update', array('_controller' => 'Elham\\Controller\\UsersController::update')));
//Articles
$routes->add('InputArticleForm',new Route('/articles/input',array('_controller'=>'Elham\\Controller\\ArticlesController::create')));
$routes->add('InputArticlePost',new Route('/articles/post',array('_controller'=>'Elham\\Controller\\ArticlesController::store')));
$routes->add('ShowArticle',new Route('/articles/{id}',array('_controller'=>'Elham\\Controller\\ArticlesController::show')));
$routes->add('EditArticle',new Route('/article/edit/{id}',array('_controller'=>'Elham\\Controller\\ArticlesController::edit')));
$routes->add('UpdateArticle',new Route('/article/update/{id}',array('_controller'=>'Elham\\Controller\\ArticlesController::update')));
$routes->add('DeleteArticle',new Route('/article/delete/{id}',array('_controller'=>'Elham\\Controller\\ArticlesController::destroy')));

$routes->add('UserDelete', new Route('/user/{id}/delete', array('_controller' => 'Elham\\Controller\\HomeController::delete')));
$routes->add('UserShow', new Route('/usersarticle/show', array('_controller' => 'Elham\\Controller\\UsersController::show')));
return $routes;