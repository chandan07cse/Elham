<?php
namespace Elham\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Philo\Blade\Blade;

class BaseController
{
    public function plainView(Request $request)
    {
        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();
        include sprintf(__DIR__ . '/../../app/Views/%s.php', $_route);
        return new Response(ob_get_clean());
    }

    public function twigView($template,$params)
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../Views');
        $twig = new \Twig_Environment($loader,array(
            'debug' => true));
        $twig->addExtension(new \Twig_Extension_Debug());

        echo $twig->render($template,$params);
    }

    public function bladeView($template,$params=[])
    {
        $blade = new Blade(__DIR__.'/../Views', __DIR__."/cache");
        echo $blade->view()->make($template,$params)->render();
    }

    public function redirect($route)
    {
        header('location:'.$route);
        return $this;
    }

    public function sendEmail($from,$to,$subject,$body,$template=null,$datumn=[],$attachment=null)
    {

        $transport = \Swift_SmtpTransport::newInstance(getenv('MAIL_HOST'),getenv('MAIL_PORT'), getenv('MAIL_ENCRYPTION'))
            ->setUsername(getenv('MAIL_USERNAME'))
            ->setPassword(getenv('MAIL_PASSWORD'));
        $mailer = \Swift_Mailer::newInstance($transport);

        $body = $template ? file_get_contents(__DIR__.'/../Views/'.$template) : $body;
        $type = $template ? 'text/html' : '';
        $data = [];
        foreach($datumn as $key=>$value)
            $data["%".$key."%"] = $value;
        $replacements[$to] = $data;
        $plugin = new \Swift_Plugins_DecoratorPlugin($replacements);
        $mailer->registerPlugin($plugin);
        $message = \Swift_Message::newInstance($subject)
            ->setFrom(array($from => 'Freak Arian'))
            ->setTo($to)
            ->setBody($body,$type);
        $message->attach(\Swift_Attachment::fromPath($attachment,'Attachment'));

       return $mailer->send($message);
    }
    public function setFlash($name, $message, $class)
    {
        $session = new Session();

        if(!$session->getId())
           $session->start();

        $session->getFlashBag()->add($name,  array(
            'class' => $class,
            'message' => $message
        ));
        return $this;
    }

    public static function getFlash($flashKey)
    {
        $session = new Session();
        foreach ($session->getFlashBag()->get($flashKey, array()) as $value)
         echo "<div class='{$value['class']}' id='flashing'>{$value['message']}</div>";

    }
    public function with($values=[])
    {
        $session = new Session();
        if(!$session->getId())
            $session->start();
        foreach($values as $key=>$value)
             $session->getFlashBag()->add($key,$value);
        return $this;
    }

    public static function getWith($withKey)
    {
        $session = new Session();
        foreach ($session->getFlashBag()->get($withKey, array()) as $values)
            $values = json_decode($values);
        return @$values;
    }
}