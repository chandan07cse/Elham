<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elham\Model\User;

class HomeController extends BaseController{


    public function index(Request $request)
    {
        $me = "Elham";
        $message = "Believe you can and you're halfway there";
        $this->bladeView('Home',compact('message','me'));
    }

    public function getAllUser()
    {
        $user = new User();
        echo json_encode($user->getAll()) ;

    }



    public function show()
    {
        $users = User::getAll();
        $this->bladeView('UserShow',compact('users'));
    }

    public function edit($id)
    {
        $userData = User::getSpecificUser($id);
        $this->bladeView('UserEdit',compact('userData'));
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
            $this->redirect('/user/'.$userId,$errorBag,$inputs);//sending errors to a route with error bag & old values
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
                $this->redirect('/user/'.$userId.'?message=User Updated Successfully');
            }
        }
    }

    public function delete($id)
    {
        $delete = User::remove($id);
        if($delete)
            $this->redirect('/user/show?message=User Deleted Successfully');
    }
}