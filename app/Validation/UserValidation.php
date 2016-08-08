<?php
namespace Elham\Validation;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException as Exceptions;
class UserValidation{

    protected $rules=[];
    protected $errors = [];

    public function __construct()
    {
        $this->initRules();
    }

    public function initRules()
    {
        /* Go to below link & grab the rules
         * https://github.com/Respect/Validation/blob/master/docs/VALIDATORS.md
         * ordering necessary for ordering output
         * */

        $this->rules['username'] = v::alnum()->noWhitespace()->length(4, 20)->setName('username');
        $this->rules['email'] = v::email()->setName('email');
        $this->rules['password'] = v::alnum()->noWhitespace()->length(4, 20)->notEmpty()->setName('password');

    }

    public function validate(array $inputs)
    {
        foreach ($this->rules as $rule => $validator) {
            try {
                $validator->assert(array_get($inputs, $rule));
            } catch (Exceptions $e) {
                $this->errors = array($rule => $e->getMessages());
                return false;
            }
        }
//        $this->PasswordConfirmation($inputs);

    }
//    public function PasswordConfirmation(array $inputs)
//    {
//        $passwordConfirmation = array_get($inputs, 'confirm_password');
//        if ($inputs['password'] !== $passwordConfirmation) {
//            $this->errors['confirm_password'] = array('confirm_password'=>'Password didn\'t match');
//            return false;
//        } else
//            return true;
//
//    }

//    public function imageCheck($image)
//    {
//        if(!v::image()->validate($image))
//            $this->errors['image'] = array('image'=>'Not a valid image');
//    }
    public function errors()
    {
        return $this->errors;
    }
}