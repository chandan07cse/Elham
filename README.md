# # Elham - Inspiring You The Next 
First of all, I would like to say, I don't like to reinvent the wheel. Instead i would like to build my car by assembling the already invented wheels. 
This is just the reflection of my thoughts. Hope that make sense.
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
$ composer install
```
- To check the list of dependencies Elham relies, run the command
```sh
$ composer info
```
- After that rename or copy(preferred) .env.sample to .env 
```sh
$ sudo cp .env.sample .env
```
- As Elham used [Phinx](https://phinx.org/) for migrations, so to use phinx command just run from the terminal
```sh
$ echo "alias phinx='./phinx'" >> ~/.bash_aliases && source ~/.bash_aliases
$ phinx
```
- Elham also used [Psyshell](http://psysh.org/) for tinkering with its functionalities, so to use psysh command just run from the terminal
```sh
$ echo "alias psysh='./psysh'" >> ~/.bash_aliases && source ~/.bash_aliases
$ psysh
```
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
- Now to run your first application of Elham, cd into your project and run through php command like below
```sh
$ cd your_project_name
$ php -S localhost:8000
```
- Now hit your browser by localhost:8000
 
