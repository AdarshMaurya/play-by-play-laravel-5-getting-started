# play-by-play-laravel-5-getting-started
This project introduces the Laravel framework to a relatively green PHP developer who is tasked with building a functional and maintainable microservice application. It will cover everything from project setup &amp; installation to functioning endpoints with automated test support.

 ##Swith to your terminal and type the commands below:

 
 ***Step1 : Install Composer*** [https://getcomposer.org/download/](https://getcomposer.org/download/)

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`

**Installer verified**

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** `php composer-setup.php`

**All settings correct for using Composer**

Downloading...

  

Composer (version 1.7.3) successfully installed to: /Users/adarshmaurya/Playground/play-by-play-laravel-5-getting-started/composer.phar

Use it: php composer.phar


***Step2: Install Laravel and create a project using composer***

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

**Adarsh:play-by-play-laravel-5-getting-started adarshmaurya$** 
