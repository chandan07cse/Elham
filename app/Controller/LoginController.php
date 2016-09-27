<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elham\Model\User;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends BaseController{

    protected $user,$session;

    public function __construct()
    {
        $this->user = new User();
        $this->session = new Session();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $this->bladeView('Login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $this->user->setEmail($email);
        $this->user->setPassWord($password);
        if($this->user->checkExistenceForLogin())
        {
            $this->session->start();
            $this->session->set('email',$email);
            $this->redirect('/user/dashboard')->setFlash('greeting','Welcome To Dashboard','alert alert-success text-center');
        }
        else
            $this->redirect('/user/login')->setFlash('greeting','Wrong Credentials','alert alert-danger text-center');
    }

    public function logout()
    {
        $this->session->start();
        $this->session->invalidate();
        $this->redirect('/user/login');
    }
}