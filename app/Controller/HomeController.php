<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elham\Model\User;

class HomeController extends BaseController{

    public function index(Request $request)
    {
        $me = "Elham";
        $message = "Believe you can and you're halfway there";
        $request->attributes->set('values',compact('me','message'));
        return $this->plainView($request);
        //$this->bladeView('Home',compact('message','me'));
        //$this->twigView('Home.twig',compact('message','me'));
    }

    public function getAllUser()
    {
        $user = new User();
        echo json_encode($user->getAll()) ;

    }
}