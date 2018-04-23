# Composer

#### [Composer Full Instructions](Download Composer Full Instructions)

```bash
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"

$ mv composer.phar /usr/local/bin/composer
$ composer global require "laravel/installer"
```

Edit `~/.bash_profile`

`$ export PATH=${PATH}:$HOME/.composer/vendor/bin`


#### Virtual Machine Setup

###### Installing homestead

```bash
$ vagrant plugin install vagrant-bindfs
$ vagrant box add laravel/homestead

$ cd $PROJECTS/blog # goto your laravel development project
$ composer require laravel/homestead --dev # adds homestead dependencies to composer.json

$ php vendor/bin/homestead make # Adds VagrantFile to project
```

# Laravel

#### Create app with ReactJS
```bash
$ laravel new react-lesson
$ cd react-lesson
$ php artisan preset react # creates react scaffolding
$ npm install && npm run dev # Compiles scaffolding
```

#### Commands
```bash
$ php artisan list migrate
$ php artisan migrate # run latest migrations
$ php artisan migrate:fresh # reset db

$ php artisan make:migration create_tasks_table --create tasks
$ php artisan make:model Task -mc # create task model with associated model and Controller

$ php artisan make:controller TasksController -r # add resources

$ php artisan make:auth # Sets up authentication system with scaffolding

$ php artisan make:request RegistrationRequest # request objects
```

#### Eloquent Models
```php
App\Task::all();
App\Task::where('id', '>', 2)->get();
App\Task::pluck('body').first();
App\Task::where('id', 1)->get()->first();
App\Task::where('completed', true)->get();
```

#### Scopes

```php
public function scopeIncomplete($query) {
return $query->where('completed', false);
}
```

`App\Task::incomplete()->where('id', '>=', 2)->get();`

#### Compile SASS / SCSS

```bash
$ brew install node
$ cd {{LARAVEL_PROJECT_DIR}}
$ npm run watch
```

#### Mailers

`$ php artisan make:mail WelcomeAgain --markdown="emails.welcome-again"`

# Tinx
composer require --dev ajthinking/tinx
php artisan tinx

# Xdebug / Debugging
#### Install Xdebug
php -m |grep xdebug # check if module already exists or not

#### Run if xdebug is not found
```bash
wget http://xdebug.org/files/xdebug-x.x.x.tgz
tar -xzvf xdebug-x.x.x.tgz
cd xdebug-x.x.x
phpize
./configure
make
make install
```
#### Add xdebug configuration to php.ini

`$ subl /usr/local/etc/php/7.2/php.ini`

```bash
[xdebug]
zend_extension="/usr/local/Cellar/php/7.2.4_1/pecl/20170718/xdebug.so"
xdebug.remote_autostart=1
xdebug.default_enable=1
xdebug.remote_host=localhost
xdebug.remote_port=9001
xdebug.remote_connect_back=1
xdebug.remote_enable=1
xdebug.idekey=PHPSTORM
```
