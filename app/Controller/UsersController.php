<?php

namespace Elham\Controller;
use Elham\Model\Article;
use Symfony\Component\HttpFoundation\Request;
use Elham\Validation\UserValidation;
use Elham\Model\User;
class UsersController extends BaseController{

    protected $user,$validator;

    public function __construct()
    {
        $this->user = new User();
        $this->validator = new UserValidation();
    }

    public function index()
    {

        //using eager loading
        $users = $this->user->with(['articles'=>function($q){
            $q->orderBy('id', 'desc');
        }])->find(AuthController::userId());

        //$users = $this->user->find(AuthController::userId());
        $this->bladeView('UserDashboard',compact('users'));
    }
    public function edit($id)
    {
        $userData = $this->user->getSpecificUser($id);
        $this->bladeView('UserProfile',compact('userData'));
    }
    public function update(Request $request)
    {
        $userId = $request->get('id');
        $inputs = $request->request->all(); //fetching all form fields
        $image = $request->files->get('image');
        $this->validator->validate($inputs);//validating the inputs
        if($image)
            $this->validator->imageCheck($image);//validating the image
        if($this->validator->errors())
        {
            $errorBag = $this->validator->errors();//putting errors in error bag
            $this->redirect('/user/'.$userId)     //sending errors to a route with error bag & old values
                 ->with(['errorBag'=>json_encode($errorBag),'oldInputs'=>json_encode($inputs)]);
        }
        else
        {
            $imageName = $image ? $request->get('username').'.' . $image->getClientOriginalExtension() : $request->get('oldImageName');//renaming image
            $this->user->setUserName($request->get('username'));
            $this->user->setEmail($request->get('email'));
            $this->user->setPassWord($request->get('password'));
            $this->user->setImageName($imageName);
            if($image)
                $image->move('images', $imageName);
            if($this->user->edit($userId)){
                $this->redirect('/user/'.$userId)
                     ->setFlash('userUpdateMessage','User Updated Successfully','alert alert-success text-center');
            }
        }
    }

    public function show()
    {
       $users = $this->user->with('articles')
            ->take(2)//retrieve 2 users
            ->orderBy('id', 'desc')
            ->get()->toArray();
        $this->bladeView('UserShow',compact('users'));
    }
}