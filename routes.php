<?php

$routes =[
    '/start' =>  [\Src\Controller\Actions\Start::class, 'handle'],
    '/save' => [\Src\Controller\Actions\Save::class, 'handle'],
    '/me' => [\Src\Controller\Actions\Me::class, 'handle']
];