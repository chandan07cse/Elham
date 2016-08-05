# # Elham - Inspiring You The Next 
Let's build together by not reinventing the wheel but assembling the wheels to reinvent a new giant.
### Version
1.0.0
### Installation
- First install composer globally by running the following commands
```sh
$ curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer
```
- Then download the fresh copy of Elham from our official [Github](git@github.com:chandan07cse/Elham.git) Repository
```sh
$ git clone git@github.com:chandan07cse/Elham.git your_project_name
```
- Now cd into your_project_name & install the dependencies
```sh
$ cd your_project_name
$ composer install --quiet
```
- As Elham ships with sqlite3 database with PDO & Eloquent instance, so if you don't have pdo_sqlite extension enabled, you'll certainly get an PDO driver missing error, if you'll be using pdo with sqlite. To prevent this, just enable it by the following [documentation](http://freakarian.blogspot.com/2016/08/enable-pdo-sqlite-plugin-in-ubuntu.html) 
- Now to run your first application of Elham, cd into your project and run through php command like below
```sh
$ cd your_project_name
$ php -S localhost:8000
```
- Now hit your browser by localhost:8000
- To check the list of dependencies Elham relies, run the command
```sh
$ composer info
```

- As Elham used [Phinx](https://phinx.org/) for migrations, so to use phinx command just run from the terminal
```sh
$ echo "alias phinx='./phinx'" >> ~/.bash_aliases && source ~/.bash_aliases
```
- Now you'll be able to run phinx command. To make sure phinx running perfectly, run in terminal
```sh
$ phinx
```
- You'll get the list of [Phinx](https://phinx.org/) command. To use phinx, first initialize it by the following command
```sh
$ phinx init
```
- A phinx.yml file will be generated. You need to customize it. Sample customization for development listed below
```sh
$ environments:
$ default_database: development
$ development:
          adapter: sqlite
          host: localhost
          name: db/database.sqlite
          user: root
          pass: ''
          port: 3306
          charset: utf8
```
- Phinx uses CamelCase for its functioning & it'll store the migrations & seeding inside db/migration & db/seeds directory respectively.
So if you wanna create a migration for Students table, just run in terminal
```sh
$ phinx create Students
```
- A new unique migration for Students will be generated inside db/migrations directory of Elham like below
```sh
$ use Phinx\Migration\AbstractMigration;
$ class Students extends AbstractMigration
$  { 
$       public function change()
$       {
$   
$       }
$   }
```
- Now we not gonna use the change method for the migration. Beside we'll create two methods up() & down() for our migration & rollback. So for that
we gonna code a bit something like below. Say we've our student table consisting with roll & name.
```sh
$ use Phinx\Migration\AbstractMigration;
$ class Students extends AbstractMigration
$  { 
$       public function up()
$       {
$            $students = $this->table('students');
$                    $students->addColumn('name','string',['length'=>100])
$                             ->addColumn('roll','string')
$                             ->create();
$       }
$       public function down()
$       {
$           $this->dropTable('students');
$       }
$
$   }
```
- Now to migrate, run from terminal
```sh
$ phinx migrate
```
- It'll affect our default db/databse.sqlite hopefully. Now to rollback, just run from terminal
```sh
$ phinx rollback
```
- To explore more about [Phinx](https://phinx.org/),go to their docs. 
- Elham also used [Psyshell](http://psysh.org/) for tinkering with its functionalities, so to use psysh command just run from the terminal
```sh
$ echo "alias psysh='./psysh'" >> ~/.bash_aliases && source ~/.bash_aliases
```
- Now if you wanna tinkering with psyshell just run in terminal
```sh
$ psysh
```
- You'll be into the Psyshell now. If you wanna start toying around then first initialize the proper environment. To init the environment, run in terminal
```sh
$ $enviornment = new Dotenv\Dotenv(__DIR__);
$ $environment->load();
```
- To init the database with eloquent, run in terminal
```sh
$ $db = new config\database;
$ $db->defaultDB();
```
- Now if you wanna play with User model, create an object of User by running in terminal
```sh
$ $user = new Elham\Model\User;
```
- To get all data from User model, just run in terminal
```sh
$ $user->all()->toArray();
```
- You can run every bit of eloquent & pdo queries along with other functionalities through [Psyshell](http://psysh.org/).
- Elham used [Gulp](http://gulpjs.com/) for basic front-end housekeeping of tasks like minifying css,js, autoprefixing of css and so on & so forth. To use gulp, first install node js by the following command
```sh
$ sudo apt-get install npm
```
- After that we need to install gulp globaly by the following command
```sh
$ sudo npm install -g gulp
```
- As pacakge.json already ships with Elham. So you don't have to create it. To install gulp just run the following command
```sh
$ sudo npm install gulp --save-dev
```
- The way Gulp work is - Everything is split into various plugins. So each plugin does one job & one job only. And that way we can pipe the output of one function to another. So we can say - Let's autoprefix this file & then minify it & then output it some file & then finally provide some sort of notifications. All of that stuff is really easy with Gulp.
- So if we want to use plugins, we need to install some.
Lets install, just to get started, How about minifying our css
We can do that by running into terminal
```sh
$ sudo npm install gulp-clean-css --save-dev
```
- We'll discuss more about gulp & other functionalities in our official documentation of [Elham](http://elham.urosd.com). 

