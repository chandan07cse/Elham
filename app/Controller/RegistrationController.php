<?php

namespace Elham\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elham\Model\User;
use Elham\Validation\UserValidation;


class RegistrationController extends BaseController{

    protected $validator,$user;
    public function __construct()
    {
        $this->validator = new UserValidation();
        $this->user = new User();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->bladeView('Registration');
    }

    /**
     * User sign up with form validation & email verification
     * @param $request
     * @return if validation fails, system will redirect you to sign up page with errors & old inputs
     *  if user exists, system will redirect you to sign up page with flash notification
     *  if everything goes fine, system will mail you the verification link & display flash notification
     */
    public function store(Request $request)
    {
        $inputs = $request->request->all(); //fetching all form fields
        $image = $request->files->get('image');
        $this->validator->validate($inputs);//validating the inputs
        $this->validator->imageCheck($image);//validating the image
        if($this->validator->errors())
        {
            $errorBag = $this->validator->errors();//putting errors in error bag
            $this->redirect('/user/create')//sending errors to a route with error bag & old values
                 ->with(['errorBag'=>json_encode($errorBag),'oldInputs'=>json_encode($inputs)]);
        }
        else
        {  //if you wanna get singles
            $username = $request->get('username');
            $email = $request->get('email');
            $password = $request->get('password');
            $imageName = $username.'.' . $image->getClientOriginalExtension();//renaming image
            $image->move('images', $imageName);

            $this->user->setEmail($email);

            if($this->user->exists())
                $this->redirect('/user/create')
                     ->setFlash('notice','User Already Exists','alert error text-center');
            else
            {
                $this->user->setUserName($username);
                $this->user->setPassWord($password);
                $this->user->setImageName($imageName);
                echo 'Last insert id : '.$this->user->insert();exit;
                if($this->user->insert())
                {

                    /*
                    * Mail Through Swiftmailer
                    * from,to & body is mandatory here
                    * Here template,templateData & attachment is optional
                    * */
                    $from = 'sysadmin@elham.rocks';
                    $to = $email;
                    $subject = 'Testing Elham Email Through Swiftmailer';
                    $body = "Dear {$username}, Greetings from Elham";
                    $template = "email/test.html";
                    $templateData = ['name'=>$username,'email'=>base64_encode($to),'activation_code'=>$this->user->getActivationCodeByEmail()];
                    $attachment = '../public/images/'.$imageName;
                    $mail = $this->sendEmail(
                                                $from,
                                                $to,
                                                $subject,
                                                $body,
                                                $template,
                                                $templateData,
                                                $attachment
                                            );
                    if($mail)
                       $this->redirect('/user/create')
                            ->setFlash('notice','User Created Successfully, Please Check Your Email','alert success text-center');
                }

            }
        }

    }

    /**
     * Verify the person with their associated email
     * @param $mail,$token
     * @return Redirect to login page with verification status
     */
    public function verification($mail,$token)
    {
        $mail = base64_decode($mail);
        if($this->user->activate($mail,$token))
            $this->redirect('/user/login')->setFlash('greeting','You are successfully verified','alert alert-success text-center');
        else
            $this->redirect('/user/login')->setFlash('greeting','Email Verification Failed','alert alert-warning text-center');
    }
}