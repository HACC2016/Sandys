<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Like extends Model
{
    protected $table = 'post_likes';

    protected $fillable = [
        'user_id', 
        'post_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
