<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['HOST'],
    'database' => $_ENV['NAME_DB'],
    'username' => $_ENV['USER'],
    'password' => $_ENV['PASSWORD']
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();