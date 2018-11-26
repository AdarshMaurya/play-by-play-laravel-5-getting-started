# play-by-play-laravel-5-getting-started
This project introduces the Laravel framework to a relatively green PHP developer who is tasked with building a functional and maintainable microservice application. It will cover everything from project setup &amp; installation to functioning endpoints with automated test support.

 # Getting started with Laravel
 ##Swith to your terminal and type the commands below:

> Step1 : Install Composer [https://getcomposer.org/download/](https://getcomposer.org/download/)

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`

Installer verified

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `php composer-setup.php`

All settings correct for using Composer

Downloading...

Composer (version 1.7.3) successfully installed to: /Users/adarshmaurya/Playground/play-by-play-laravel-5-getting-started/composer.phar

Use it: php composer.phar


> Install Laravel and create a project using composer
**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `./composer.phar create-project laravel/laravel --prefer-dist product-service`

Installing laravel/laravel (v5.7.15)
  - Installing laravel/laravel (v5.7.15): Downloading (100%)         
Created project in product-service
> @php -r "file_exists('.env') || copy('.env.example', '.env');"
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 72 installs, 0 updates, 0 removals
  - Installing vlucas/phpdotenv (v2.5.1): Downloading (100%)         
  - Installing symfony/css-selector (v4.1.8): Downloading (100%)         
  - Installing tijsverkoyen/css-to-inline-styles (2.2.1): Downloading (100%)      - Installing symfony/polyfill-php72 (v1.10.0): Downloading (100%)         
  - Installing symfony/polyfill-mbstring (v1.10.0): Downloading (100%)         
  - Installing symfony/var-dumper (v4.1.8): Downloading (100%)         
  - Installing symfony/routing (v4.1.8): Downloading (100%)         
  - Installing symfony/process (v4.1.8): Downloading (100%)         
  - Installing symfony/polyfill-ctype (v1.10.0): Downloading (100%)         
  - Installing symfony/http-foundation (v4.1.8): Downloading (100%)         
  - Installing symfony/event-dispatcher (v4.1.8): Downloading (100%)         
  ...
  ...
  - Installing phpunit/phpunit (7.4.4): Downloading (100%)         
Writing lock file
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: beyondcode/laravel-dump-server
Discovered Package: fideloper/proxy
Discovered Package: laravel/tinker
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
> @php artisan key:generate --ansi
Application key set successfully.

> Change the directory to product-service
**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `cd product-service`

> It shows the list of commands which makes our life easier.
**Adarsh:product-service$**`php artisan`


Laravel Framework 5.7.15

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  clear-compiled       Remove the compiled class file
  down                 Put the application into maintenance mode
  dump-server          Start the dump server to collect dump information.
  env                  Display the current framework environment
  help                 Displays help for a command
  inspire              Display an inspiring quote
  list                 Lists commands
  migrate              Run the database migrations
  optimize             Cache the framework bootstrap files
  preset               Swap the front-end scaffolding for the application
  serve                Serve the application on the PHP development server
  tinker               Interact with your application
  up                   Bring the application out of maintenance mode
 app
  app:name             Set the application namespace
 auth
  auth:clear-resets    Flush expired password reset tokens
 ...
 ...
 view
  view:cache           Compile all of the application's Blade templates
  view:clear           Clear all compiled view files

# Configuring the Project Environment
# Building the Data Model - Creating Migration
# Building the Data Midel - Rolling Back & Resetting Migration, Creating Datbase Seeders
# Creating Models
# Creating Routers
# Creating Controllers
# Querying Data - Reading Data via API
# Querying Data - Building Test Cases
# Adding Objects - Inserting Data via API
# Adding Objects - Updating Data via API
# Adding Objects - Basic Valdiation
# Adding Objects - Custom Validation
