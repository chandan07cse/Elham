<?php
namespace Elham\Model;

use config\Database;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class Post extends Eloquent{
//if you wanna use pdo
//    protected $pdo;
//
//    public function __construct()
//    {
//        $this->pdo = Database::pdo();
//    }

    /**
     * The attributes that are mass assignable to table
     *
     * @var array
     */
    protected $fillable=[
        'field1','field2'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden=['password'];
    public $timestamps = false;//uncomment this line if you wanna use created_at & updated_at fields

 protected $id, $user_id, $title, $body, $created_at, $updated_at;

    public function set_user_id($user_id)
    {
      $this->user_id = $user_id;
    }
    public function get_user_id()
    {
        return $this->user_id;
    }

    public function set_title($title)
    {
      $this->title = $title;
    }
    public function get_title()
    {
        return $this->title;
    }

    public function set_body($body)
    {
      $this->body = $body;
    }
    public function get_body()
    {
        return $this->body;
    }
}