# Elham - Inspiring You The Next - A Product Of UROSD Lab
:loudspeaker: Let's build together by not reinventing the wheel but assembling the wheels to reinvent a new :rocket:
### :beginner: Version 1.0.0
### :feet: Installation
:small_blue_diamond: First install composer globally(if you don't have it) by running the following commands  
For Ubuntu
```sh
 curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer
```
For Cent OS 
```sh
 curl -sS https://getcomposer.org/installer | php && chmod +x composer.phar && sudo mv composer.phar /usr/local/bin/composer
```
:small_blue_diamond: Then install Elham by the following command(for latest stable releases)
```sh
 composer create-project chandan07cse/elham YOUR_PROJECT_NAME
```
:small_blue_diamond: But if you want Elham from its master branch, then you could certainly type it
```sh
 composer create-project chandan07cse/elham=dev-master YOUR_PROJECT_NAME
```
:small_blue_diamond: Now cd into your_project_name/public & run by the php command
```sh
 cd YOUR_PROJECT_NAME/public
 php -S localhost:8000
```
:small_blue_diamond: Note : For the rest of the project we'll run each & every command from the project directory. For that
```sh
 cd ../
```
# :package: Dependencies
:small_blue_diamond: To check the list of dependencies Elham relies, run the command
```sh
 composer info
```
# :flashlight: Visual Dependencies
- To check the visual dependencies, please go to the link [Visual Dependecies](https://www.versioneye.com/php/chandan07cse:elham/1.0.0/visual_dependencies)

# :musical_keyboard: Elham Command Alias
:small_blue_diamond: Let's run the below command to run elham command if you are in Linux
```sh
 echo "alias elham='./elham'" >> ~/.bash_aliases && source ~/.bash_aliases
```
:small_blue_diamond: But if you are in windows machine then run the following command in terminal(You can cetainly use [Laragon](https://laragon.org/))
```sh
 doskey elham=php ./elham $*
```
:small_blue_diamond: Now you can run elham command through out your project. To check run from the terminal
```sh
 elham
```
# :violin: Build Controller Through CLI
:small_blue_diamond: Elham provides you the build:controller command
```sh
 elham build:controller YourController
```
:small_blue_diamond: Check it by finding it in app/Controller directory of your project.

:small_blue_diamond: By default elham generates resourceful controller. But if you want you can always make a plain controller by running
```sh
 elham build:controller YourController plain
```
# :guitar: Build Model Through CLI
:small_blue_diamond: Elham also provides you build:model command
```sh
 elham build:model YourModel
```
:small_blue_diamond: It'll create a model with necessary properties & methods based on your database table. 
# :saxophone: Build Form Through CLI
:small_blue_diamond: Elham ships with build:form command
```sh
 elham build:form YourForm
```
:small_blue_diamond: A dummy blade form will be generated inside app/Views/_partials directory.

# :musical_score: Build Validator Through CLI
:small_blue_diamond: Elham also provides you build:validator command
```sh
 elham build:validator YourValidator
```
:small_blue_diamond: A validation class will be generated inside app/Validation directory.

# :microphone: Help keyword for CLI generators
:small_blue_diamond: Now if you need any help just type
```sh
 elham help build:keyword
```
:small_blue_diamond: All the commands check the existing ones as well for simplicity.

# :necktie: :dress: Elham Templating Engines
:small_blue_diamond: Elham ships with Blade and Plain view for rendering its View. But if you want you can use twig too. For that you
will need to install [TWIG](http://twig.sensiolabs.org/) by the following command
```sh
 composer require twig/twig
```

# :palm_tree: :seedling: Elham Migrations & Seeding
:small_blue_diamond: As Elham used [Phinx](https://phinx.org/) for migrations & seeding, so to use phinx command just run from the terminal
```sh
 echo "alias phinx='./phinx'" >> ~/.bash_aliases && source ~/.bash_aliases
```
:small_blue_diamond: Now you'll be able to run phinx command. To make sure phinx running correctly, run in terminal
```sh
 phinx
```
:small_blue_diamond: You'll get the list of [Phinx](https://phinx.org/) command. To use phinx, first initialize it by the following command
```sh
 phinx init
```
:small_blue_diamond: A phinx.yml file will be generated. You need to customize it. Sample customization for development listed below
```sh
 environments:
 default_database: development
 development:
          adapter: sqlite
          host: localhost
          name: db/database.sqlite
          user: root
          pass: ''
          port: 3306
          charset: utf8
```
:small_blue_diamond: Phinx uses :camel: CamelCase for its functioning & it'll store the migrations & seeding inside db/migration & db/seeds directory respectively.
So if you wanna create a migration for Students table, just run in terminal
```sh
 phinx create Students
```
:small_blue_diamond: A new unique migration for Students will be generated inside db/migrations directory of Elham like below
```sh
 use Phinx\Migration\AbstractMigration;
 class Students extends AbstractMigration
  {
       public function change()
       {

       }
   }
```
:small_blue_diamond: Now we not gonna use the change method for the migration. Beside we'll create two methods up() & down() for our migration & rollback. So for that
we gonna code a bit something like below. Say we've our student table consisting with roll & name.
```sh
 use Phinx\Migration\AbstractMigration;
 class Students extends AbstractMigration
  {
       public function up()
       {
            $students = $this->table('students');
            $students->addColumn('name','string',['length'=>100])
                     ->addColumn('roll','string')
                     ->create();
       }
       public function down()
       {
           $this->dropTable('students');
       }

   }
```
:small_blue_diamond: Now to migrate, run from terminal
```sh
   phinx migrate
```
:small_blue_diamond: It'll affect our default db/databse.sqlite hopefully. Now to rollback, just run from terminal
```sh
 phinx rollback
```
:small_blue_diamond: To explore more about Phinx, please read the :link:[documentation](http://docs.phinx.org/en/latest/).

:small_blue_diamond: Now for seeding, we just need to create the seeder class from the cli. Say, we need to create a UserSeeder to seed some datumn into users table. To create the UserSeeder class
```sh
 phinx seed:create UserSeeder
```
:small_blue_diamond: We'll get the UserSeeder class inside db/seeds directory. Inside there, we'll get
```sh
 <?php
 use Phinx\Seed\AbstractSeed;
 class UserSeeder extends AbstractSeed
 {
    public function run()
    {

    }
 }
```
:small_blue_diamond: Actually we can seed in :v: ways.

   :one: Manual Seeding

   :two: Faker Seeding

:small_blue_diamond: For Manual Seeding we can write something like this in UserSeeder class
```sh
 <?php
 use Phinx\Seed\AbstractSeed;
 class UserSeeder extends AbstractSeed
 {
    public function run()
    {
      $data = array(
          array(
              'username'    => 'chandan07cse',
              'password' => md5('me'),
              'email' => 'freak.arian@gmail.com',
              'image' => 'public/images/chandan07cse.jpg',
              'activation_code' => md5(rand(0,1000)),
              'active' => 1
          ),
          array(
              'username'    => 'mamun10pgd',
              'password' => md5('mamun10pgd@!'),
              'email' => 'rajmamunet@gmail.com',
              'image' => 'public/images/mamun10pgd.jpg',
              'activation_code' => md5(rand(0,1000)),
              'active' => 0
          )
      );

       $this->insert('users', $data);
    }
 }
```
:small_blue_diamond: Now run from terminal
```sh
phinx seed:run
```
:small_blue_diamond: If you wanna run a specific class then run
```sh
phinx seed:run -s UserSeeder
```
:small_blue_diamond: For faker seeding, we can write something like this in UserSeeder class
```sh
<?php
use Phinx\Seed\AbstractSeed;
class UserSeeder extends AbstractSeed
{
   public function run()
   {
     $faker = Faker\Factory::create();
     $data = [];
     for ($i = 0; $i < 4; $i++) {
         $data[] = [

             'username'      => $faker->userName,
             'password'      => md5($faker->password),
             'email'      => $faker->email,
             'image'      => $faker->image($dir = 'public/images',$width = 640, $height = 480),
             'activation_code'=> $faker->randomElement(),
             'active'      => $faker->boolean

         ];
     }

     $this->insert('users', $data);

    }
}
```

# :soccer::basketball::football::baseball::tennis: Elham Playground
:small_blue_diamond: Elham also uses [Psyshell](http://psysh.org/) for tinkering with its functionalities, so to use psysh command just run from the terminal
```sh
 echo "alias psysh='./psysh'" >> ~/.bash_aliases && source ~/.bash_aliases
```
:small_blue_diamond: Now if you wanna tinkering with psyshell just run in terminal
```sh
 psysh
```
:small_blue_diamond: You'll be into the Psyshell now. If you wanna start toying around then first initialize the proper environment. To init the environment, run in terminal
```sh
 $environment = new Dotenv\Dotenv(__DIR__);
 $environment->load();
```
:small_blue_diamond: To init the database with eloquent, run in terminal
```sh
 $db = new config\Database;
```
:small_blue_diamond: Now if you wanna query through Eloquent/Query Builder, create an instance of the Capsule
```sh
 $db->eloquent();
```
:small_blue_diamond: Now if you wanna play with User model, create an object of User by running in terminal
```sh
 $user = new Elham\Model\User;
```
:small_blue_diamond: To get all data from User model, just run in terminal
```sh
 $user->all()->toArray();
```
:small_blue_diamond: And if you wanna query through PDO, create an instance of the PDO
```sh
 $pdo = $db->pdo();
```
:small_blue_diamond: If you wanna insert some data into users table using pdo, do the following

```sh
  $pdo =  $pdo->prepare("insert into users values(:id,:username,:email,:password,:image,:activation_code,:active)");
  $pdo->execute([':id'=>null,':username'=>'moin07cse',':password'=>'hjkkjhkjjk',':image'=>'moin.png',':activation_code'=>'dfsf',':active'=>0]);
  $pdo->fetchAll(PDO::FETCH_ASSOC);
```

:small_blue_diamond: You can run every bit of eloquent & pdo queries along with other functionalities through [Psyshell](http://psysh.org/).

# :house_with_garden: Elham Frontend Housekeeping
:small_blue_diamond: Elham uses [Gulp](http://gulpjs.com/) for basic front-end housekeeping of tasks like minifying css,js, autoprefixing of css and so on & so forth. To use gulp, first install node js by the following command
```sh
 sudo apt-get install npm
```
:small_blue_diamond: After that we need to install gulp globaly by the following command
```sh
 sudo npm install -g gulp
```
:small_blue_diamond: As pacakge.json already ships with Elham. So you don't have to create it. To install gulp just run the following command
```sh
 sudo npm install gulp --save-dev
```
:small_blue_diamond: The way Gulp work is - Everything is split into various plugins. So each plugin does one job & one job only. And that way we can pipe the output of one function to another. So we can say - Let's autoprefix this file & then minify it & then output it some file & then finally provide some sort of notifications. All of that stuff is really easy with Gulp.
:small_blue_diamond: So if we want to use plugins, we need to install some.
Lets install, just to get started, How about minifying our css
We can do that by running into terminal
```sh
 sudo npm install gulp-clean-css --save-dev
```

# :strawberry: Elham Zero Second Deployment
:small_blue_diamond: Elham proudly compatibles with [ngrok](https://ngrok.com/). So you can deploy it less than a second.
For that you'll have to install node & nodejs-legacy by the following command
```sh
 sudo apt-get install node
 sudo apt install nodejs-legacy
```
:small_blue_diamond: After that we gonna install ngrok through (npm)node package manager globally
```sh
 sudo npm install ngrok -g
```
:small_blue_diamond: Now we gonna deploy our project by just running the following command
```sh
 ngrok http 8000
```
:small_blue_diamond: Make sure you are running your project through port 8000. If you are using other port, then use
 that port to ngrok

# :grapes: Elham Production Deployment
:small_blue_diamond: Don't worry it also supports any repo(Github,Gitlab,Bitbucket....) and any CI (Jenkins) and any server(Linux Distro. preferred) in deployment.
