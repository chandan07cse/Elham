<?php
namespace config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class database{
    protected $capsule,$pdo;

    //init capsule instance cause it's highly recommended to use eloquent for simplicity
    public function __construct()
    {
        $this->capsule = new Capsule();
    }

    public function connectThroughCapsule()
    {
        $this->capsule->addConnection([
            'driver' => getenv('DB_DRIVER'),
            'database' => getenv('DB_DATABASE'),
            'host' => getenv('DB_HOST'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'prefix' => '',
            'port' => getenv('DB_PORT'),
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci']);

        /*
         * For sqlite
         * */
        //$capsule->addConnection([
        //    'driver'=>'',
        //    'database'=>'database/database.sqlite',
        //    'prefix'=>'',
        //    ]);

        $this->capsule->setEventDispatcher(new Dispatcher(new Container));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        return $this->capsule;
    }
    public function connectThroughPDO()
    {
        $driver = getenv('DB_DRIVER');
        $host = getenv('DB_HOST');
        $database = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $this->pdo = new \PDO("{$driver}:host={$host};dbname={$database}","{$username}","{$password}");//local

        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

        return $this->pdo;
    }
}



