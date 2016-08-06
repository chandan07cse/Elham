<?php
namespace Elham\Model;

use config\PDO;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class Student extends Eloquent{
    //use PDO;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[];//remember the format
    public $timestamps = false;

}