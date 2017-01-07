<?php
namespace Elham\Model;

use config\Database;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class YourModel extends Eloquent{
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

}