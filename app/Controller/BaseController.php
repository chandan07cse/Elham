<?php
namespace Elham\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    public function redirect($route,$errorBag=null,$oldInputValues=null)
    {
        if($errorBag==null && $oldInputValues==null)
            header('location:'.$route);
        elseif($errorBag!=null && $oldInputValues==null)
            header('location:'.$route.'?errorBag='.json_encode($errorBag));
        elseif($errorBag==null && $oldInputValues!=null)
            header('location:'.$route.'?oldInputs='.json_encode($oldInputValues));
        else
        header('location:'.$route.'?errorBag='.json_encode($errorBag).'&oldInputs='.json_encode($oldInputValues));

    }

    public function SendMailUsingSendgrid($from,$to,$subject,$message,$template=null,$data=[],$attachment=null)
    {
        $sendgrid_username = getenv('MAIL_USERNAME');
        $sendgrid_password = getenv('MAIL_PASSWORD');

        $template = file_get_contents(__DIR__.'/../Views/'.$template);
        if($attachment!=null) {
            $extension = strstr(strtolower($attachment), ".");
            $attachment = __DIR__ . '/../' . $attachment;
        }
        $sendgrid = new \SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
        $email    = new \SendGrid\Email();
        $email->addTo($to)->
        setFrom($from)->
        setSubject($subject)->
        setText($message)->
        setHtml($template);
        foreach($data as $key=>$value)
        {
            $email->addSubstitution('%'.$key.'%',array($value));
        }
        if($attachment!=null)
         $email->addAttachment($attachment, 'attachment'.$extension);

        return $sendgrid->send($email);
    }
}