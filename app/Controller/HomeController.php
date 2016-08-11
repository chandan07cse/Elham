<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elham\Model\User;
use Elham\Validation\UserValidation;
class HomeController extends BaseController{

    protected $validator,$user;
    public function __construct()
    {
        $this->validator = new UserValidation();
        $this->user = new User();
    }
    public function index(Request $request)
    {
        $me = "Elham";
        $message = "Believe you can and you're halfway there";
//        $request->attributes->set('values',compact('me','message'));
//        return $this->plainView($request);
        $this->bladeView('Home',compact('message','me'));
        //$this->twigView('Home.twig',compact('message','me'));
    }

    public function getAllUser()
    {
        $user = new User();
        echo json_encode($user->getAll()) ;

    }

    public function create()
    {
        $this->bladeView('User');

    }

    public function store(Request $request)
    {
        $inputs = $request->request->all(); //fetching all form fields
        $image = $request->files->get('image');
        $this->validator->validate($inputs);//validating the inputs
        $this->validator->imageCheck($image);//validating the image
        if($this->validator->errors())
        {
            $errorBag = $this->validator->errors();//putting errors in error bag
            $this->redirect('/user/create',$errorBag,$inputs);//sending errors to a route with error bag & old values
        }
        else {
            /*
             * if you wanna get singles
             * */
            $username = $request->get('username');
            $email = $request->get('email');
            $password = $request->get('password');
            $imageName = $username.'.' . $image->getClientOriginalExtension();//renaming image
            $image->move('images', $imageName);
            $mail = $this->SendMailUsingSendgrid(
                'chandan07cse@gmail.com',
                'freak.arian@gmail.com',
                'Test',
                'Testing Yarr',
                'email/test.html',
                array('name'=>'Noor','email'=>'sysadmin@urosd.com','address'=>'33, Shahid Sorhawardi College Road'),
                '../public/images/'.$imageName
            );
            $this->user->setUserName($username);
            $this->user->setEmail($email);
            $this->user->setPassWord($password);
            $this->user->setImageName($imageName);
            if($this->user->insert() && $mail){
                $this->redirect('/user/create?message=User Created Successfully, Please check your email');
            }

        }

    }

    public function show()
    {
        $users = $this->user->getAll();
        $this->bladeView('UserShow',compact('users'));
    }

    public function edit(Request $request)
    {
        $userId = $request->get('id');
        //echo $userId; exit;
        $userData = $this->user->getSpecificUser($userId);
        $this->bladeView('UserEdit',compact('userData'));
    }

    public function update(Request $request)
    {
        $userId = $request->get('id');
        echo $userId;
        $inputs = $request->request->all(); //fetching all form fields
        $image = $request->files->get('image');
        $this->validator->validate($inputs);//validating the inputs
        if($image)
           $this->validator->imageCheck($image);//validating the image
        if($this->validator->errors())
        {
            $errorBag = $this->validator->errors();//putting errors in error bag
            $this->redirect('/user/'.$userId,$errorBag,$inputs);//sending errors to a route with error bag & old values
        }
        else
        {
            $imageName = $request->get('username').'.' . $image->getClientOriginalExtension();//renaming image
            $this->user->setUserName($request->get('username'));
            $this->user->setEmail($request->get('email'));
            $this->user->setPassWord($request->get('password'));
            $this->user->setImageName($imageName);
            $image->move('images', $imageName);
            if($this->user->edit($userId)){
                $this->redirect('/user/'.$userId.'?message=User Updated Successfully');
            }
        }
    }

    public function delete(Request $request)
    {
        $userId = $request->get('id');
        $delete = $this->user->remove($userId);
        if($delete)
            $this->redirect('/user/show?message=User Deleted Successfully');
    }
}