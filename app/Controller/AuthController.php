<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Elham\Model\User;
class AuthController{

   /*
    * Checking the validity of a user
    * @param $authKey. But email is default auth key here
     * return if the user is illegal then invalidate his/her session and redirect him to login page
    * */
    public static function check($authKey='email')
    {
        $session = new Session();
        if(!$session->get($authKey))
        {
            $session->invalidate();
            (new BaseController())->redirect('/user/login');
        }
    }

    public static function userName()
    {
        $session = new Session();
        $get = User::where('email',$session->get('email'))->first(['username']);
        return $get->username;
    }

    public static function userId()
    {
        $session = new Session();
        $get = User::where('email',$session->get('email'))->first(['id']);
        return $get->id;
    }

    public static function image()
    {
        $session = new Session();
        $get = User::where('email',$session->get('email'))->first(['image']);
        return $get->image;
    }
}