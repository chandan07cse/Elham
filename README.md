# Elham - Inspiring You The Next - A Product Of UROSD Lab
Let's build together by not reinventing the wheel but assembling the wheels to reinvent a new giant.
### Version
1.0.0
### Installation
- First install composer globally(if you don't have it) by running the following commands
```sh
$ curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer
```
- Then install Elham by the following command(for latest stable releases)
```sh
$ composer create-project chandan07cse/elham YOUR_PROJECT_NAME
```
- But if you want Elham from its master branch, then you could certainly type it
```sh
$ composer create-project chandan07cse/elham=dev-master YOUR_PROJECT_NAME
```
- Now cd into your_project_name & run by the php command
```sh
$ cd YOUR_PROJECT_NAME
$ php -S localhost:8000
```
# Dependencies
- To check the list of dependencies Elham relies, run the command
```sh
$ composer info
```
# Elham Command Alias
- Let's run the below command to run elham command
```sh
$ echo "alias elham='./elham'" >> ~/.bash_aliases && source ~/.bash_aliases
```
- Now you can run elham command through out your project. To check run from the terminal
```sh
$ elham
```
# Build Controller Through CLI
- Elham provides you the build:controller command
```sh
$ elham build:controller YourController
```
- Check it by finding it in app/Controller directory of your project.
- By default elham generates resourceful controller. But if you want you can always make a plain controller by running
```sh
$ elham build:controller YourController plain
```
# Build Model Through CLI
- Elham also provides you build:model command
```sh
$ elham build:model YourModel
```
# Build Form Through CLI
- Elham ships with build:form command 
```sh
$ elham build:form YourForm
```
- A dummy blade form will be generated inside app/Views/_partials directory.

# Build Validator Through CLI
- Elham also provides you build:validator command 
```sh
$ elham build:validator YourValidator
```
- A validation class will be generated inside app/Validation directory.

# Help keyword for CLI generators
- A validation class will be generated inside app/Validation directory
- Now if you need any help just type 
```sh 
$ elham help build:keyword 
``` 
- All the commands check the existing ones as well for simplicity.

# Elham Templating Engines 
- Elham ships with Blade and Plain view for rendering its View. But if you want you can use twig too. For that you
will need to install [TWIG](http://twig.sensiolabs.org/) by the following command
```sh
$ composer require twig/twig
```

# Elham Migrations
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
- To explore more about Phinx, please read the [documentation](http://docs.phinx.org/en/latest/). 

# Elham Playground
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

# Elham Frontend Housekeeping
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

# Elham Zero Second Deployment
- Elham proudly compatibles with [ngrok](https://ngrok.com/). So you can deploy it less than a second.
For that you'll have to install node & nodejs-legacy by the following command
```sh
$ sudo apt-get install node
$ sudo apt install nodejs-legacy
```
- After that we gonna install ngrok through (npm)node package manager globally
```sh
$ sudo npm install ngrok -g
```
- Now we gonna deploy our project by just running the following command
```sh
$ ngrok http 8000
``` 
- Make sure you are running your project through port 8000. If you are using other port, then use
 that port to ngrok

# Elham Production Deployment
- Don't worry it also supports any repo(Github,Gitlab,Bitbucket....) and any CI (Jenkins) and any server(Linux Ditro. preferred) in deployment.