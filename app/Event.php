<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';

    protected $fillable = [
        'user_id',
        'event_name',
        'event_description',
        'start_month',
        'start_day',
        'start_year',
        'end_month',
        'end_day',
        'end_year',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
