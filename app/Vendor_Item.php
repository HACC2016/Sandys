<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_Item extends Model
{
    protected $table = 'vendor_items';
    //

    protected $fillable = [
        'vendor_id', 
        'item', 
        'description', 
        'price', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function getPricePer($i) {
        switch($i) {
            case 1:
                return "Pound";
                break;
            case 2:
                return "Ounce";
                break;
            case 3:
                return "Bag";
                break;
            case 4:
                return "Each";
                break;
            default:
                return "Error";
                break;
        }
    }
}
