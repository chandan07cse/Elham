<?php

    // Load the autoloader
    require_once __DIR__ . '/../vendor/autoload.php';

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\Routing\Matcher\UrlMatcher;
    use Symfony\Component\HttpKernel\Controller\ControllerResolver;
    use Elham\Elham\Core;
    use config\database;
    $dotenv = new Dotenv\Dotenv(__DIR__.'/../');
    $dotenv->load();

    $db = new database();

    $db->connectThroughCapsule();//init Eloquent
    $db->connectThroughPDO();//init PDO


    // Form the request from all possible sources - $_GET, $_POST, $_FILE, $_COOKIE, $_SESSION
    $request = Request::createFromGlobals();


    // Form the empty response
    $response = new Response();

    // Create a mapping - each URL pattern will be mapped to the page file
    $routes = include __DIR__ . '/../app/routes.php';

    // Context is needed to enforce method requirements
    $context = new RequestContext($request->getUri());

    // Create a UrlMather that will take URL paths and convert them to the internal routes
    $matcher = new UrlMatcher($routes, $context);

    // The resolver will take care of the lazy loading of our controller classes
    $resolver = new ControllerResolver();

    $framework = new Core($matcher, $resolver);
    $response = $framework->handle($request);

    if($response)
        $response->send();


