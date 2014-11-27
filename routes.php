<?php

use DeliveryMuch\Deployer\Route;
use DeliveryMuch\Deployer\Shell;

Route::get('/', function () {
    echo 'Hello, I\'m deployer 0.1';
});

Route::get('/deploy-panel', function () {
    Shell::exec('cd /var/www/panel && git stash save --keep-index && git stash drop && git pull && php artisan migrate && grunt production');
});

Route::post('/deploy-panel', function () {
    Shell::exec('cd /var/www/panel && git stash save --keep-index && git pull && php artisan migrate && php artisan dump-autoload && grunt production');
});
