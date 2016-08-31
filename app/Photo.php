<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'photos';

    protected $fillable = [
        'poster_id', 
        'file_name', 
        'mime', 
        'original_filename', 
        'caption', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
