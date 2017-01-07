<?php
/**
 * Elham - An Inspiring Framework For You
 *
 * @package  Elham
 * @author   Md. Ainul Moin Noor <freak.arian@gmail.com>
 */
namespace Elham\Elham;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class Core
{
    protected $matcher;
    protected $resolver;

    public function __construct(UrlMatcher $matcher, ControllerResolver $resolver)
    {
        $this->matcher  = $matcher;
        $this->resolver = $resolver;

    }

    public function handle(Request $request)
    {
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));

            $controller = $this->resolver->getController($request);
            $arguments = $this->resolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            ob_start();
            // We follow the naming convention. The name of the route = the name of the file
            include __DIR__ . '/../Views/error/404.php';
            //$val = sprintf(__DIR__ . '/../../app/Views/%s.twig', $_route);
            return new Response(ob_get_clean());
        } catch (\Exception $e) {
            return new Response("Something went terribly wrong. Server is confused. What have you done?! We are all doomed! \n" . $e->getMessage() . "\n" .  $e->getTraceAsString(), 500);
        }

    }
}