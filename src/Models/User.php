<?php

namespace Src\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'users2';

    protected $fillable = [
        'chat_id', 'first_name', 'last_name'
    ];

    public $timestamps = false;

}