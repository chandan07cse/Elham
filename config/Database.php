<?php
namespace config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{

   public static function eloquent()
    {
        $capsule = new Capsule();
        if (getenv('DB_DRIVER') == 'mysql')
            $capsule->addConnection([
                'driver' => 'mysql',
                'database' => getenv('DB_DATABASE'),
                'host' => getenv('DB_HOST'),
                'username' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD'),
                'prefix' => '',
                'port' => getenv('DB_PORT'),
                'charset' => 'utf8',
                'collation' => 'utf8_general_ci'
            ]);
        elseif (getenv('DB_DRIVER') == 'sqlite')
            $capsule->addConnection([
                'driver' => 'sqlite',
                'database' => __DIR__ . '/../db/' . getenv('DB_DATABASE') . '.sqlite',
                'prefix' => '',
            ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    }
    public static function pdo()
    {
        if (getenv('DB_DRIVER') == 'mysql') {
            $driver = 'mysql';
            $host = getenv('DB_HOST');
            $database = getenv('DB_DATABASE');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');
            $pdo = new \PDO("{$driver}:host={$host};dbname={$database}", "{$username}", "{$password}");//local
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } elseif (getenv('DB_DRIVER') == 'sqlite') {
            $pdo = new \PDO('sqlite:' . __DIR__ . '/../db/' . getenv('DB_DATABASE') . '.sqlite');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;
    }

}
