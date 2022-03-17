<?php

$routes =[
    '/start' =>  [\Src\Actions\Start::class, 'handle'],
    '/save' => [\Src\Actions\Save::class, 'handle'],
    '/me' => [\Src\Actions\Me::class, 'handle']
];