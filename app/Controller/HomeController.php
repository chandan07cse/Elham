<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends BaseController{

    public function index()
    {
        $me = "Elham";
        $message = "Believe you can and you're halfway there";
        $this->bladeView('Home',compact('message','me'));
    }
}