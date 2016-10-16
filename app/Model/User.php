<?php
namespace Elham\Model;
use config\Database;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class User extends Eloquent{

    protected $pdo;
    public function __construct()
    {
        $this->pdo = Database::pdo();
    }
    protected $fillable=['username','email','password','image','activation_code','active'];//remember the format
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
        $this->passWord = md5($passWord);
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

    public function exists()
    {
        return User::where('email',$this->getEmail())->first();
    }

    public function checkExistenceForLogin()
    {
        return User::where([['email',$this->getEmail()],['password',$this->getPassWord()]])->first();
    }
    public function insert()
    {
//        $command = User::create([
//            'username'=>$this->getUserName(),
//            'password'=>$this->getPassWord(),
//            'email'=>$this->getEmail(),
//            'image'=>$this->getImageName()
//        ]);
//        return $command->id;
//        using Query Builder
//       $command = Capsule::table('forms')->insert([
//           'id'=>null,
//           'username'=>'Noor',
//           'email'=>'freak.arian@gmail.com',
//           'password'=>'chandan07cse@!',
//           'image'=>'images/me.jpg'
//       ]);
        //$db = new \PDO('sqlite:' . __DIR__ . '/../../db/' . getenv('DB_DATABASE') . '.sqlite');
        //$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $command = $this->pdo->prepare("insert into users values (:id,:username,:password,:email,:image,:activation_code,:active)");

        $command->execute(array(
            ':id'=>null,
            ':username'=>$this->getUserName(),
            ':password'=>$this->getPassWord(),
            ':email'=>$this->getEmail(),
            ':image'=>$this->getImageName(),
            ':activation_code'=>md5( rand(0,1000)),
            ':active'=>0
        ));

        return $this->pdo->lastInsertId();
    }


    public function getActivationCodeByEmail()
    {
        $get = User::where('email',$this->getEmail())
            ->first(['activation_code']);
        return $get->activation_code;
    }

    public function activate($mail,$token)
    {
        $exists = User::where([['email',$mail],['activation_code',$token]])->first();
        if($exists) {
            //update the active state to 1
            User::where('email', $mail)
                ->update(
                    [
                        'active' => 1
                    ]
                );
            return true;
        }
        else
            // do nothing & false return
            return false;



    }
    public function getAll()
    {
        //return User::all()->toArray();
        $getAll = $this->pdo()->prepare("select * from users");
        $getAll->execute();
        return $getAll->fetch(\PDO::FETCH_ASSOC);


    }

    public function getSpecificUser($userId)
    {
        return User::find($userId)->toArray();
    }

    public function edit($userId)
    {
        $update = User::where('id',$userId)
            ->update([
                    'username' => $this->getUserName(),
                    'password' => $this->getPassWord(),
                    'email' => $this->getEmail(),
                    'image' => $this->getImageName()]
            );
        return $update ? true : false;
    }

    public function remove($userId)
    {
        return User::find($userId)->delete();

    }

    public function articles()
    {
        return $this->hasMany(Article::class,'user_id','id');
    }

}
