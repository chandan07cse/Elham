<?php
namespace Elham\Model;
use Carbon\Carbon;
use config\PDO;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class User extends Eloquent{
    //use PDO;
    protected $fillable=['username','email','password','image'];//remember the format
    protected $userName,$email,$passWord,$imageName;
    public $timestamps = false;
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;
    }

    public function getPassWord()
    {
        return $this->passWord;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    public function getImageName()
    {
        return $this->imageName;
    }
    public function insert()
    {
        $command = Form::create([
            'username'=>$this->getUserName(),
            'email'=>$this->getEmail(),
            'password'=>$this->getPassWord(),
            'image'=>$this->getImageName()
        ]);
//        using Query Builder
//       $command = Capsule::table('forms')->insert([
//           'id'=>null,
//           'username'=>'Noor',
//           'email'=>'freak.arian@gmail.com',
//           'password'=>'chandan07cse@!',
//           'image'=>'images/me.jpg'
//       ]);
        return $command ? true : false;
    }

    public function getAll()
    {
        return User::all()->toArray();
    }
}