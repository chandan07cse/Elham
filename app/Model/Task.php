<?php
namespace Elham\Model;

use config\PDO;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class Task extends Eloquent{
    //use PDO;
    protected $fillable=[];//remember the format
    public $timestamps = false;

}