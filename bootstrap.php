<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => HOST,
    'database' => NAME_BD,
    'username' => USER,
    'password' => PASSWORD
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();