<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patron extends Model
{
    //
    protected $table = 'patrons';

    protected $fillable = [
        'user_id',
        'username', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
