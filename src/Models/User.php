<?php

namespace Src\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent

{

    protected $table = 'users2';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'chat_id', 'first_name', 'last_name'

    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}