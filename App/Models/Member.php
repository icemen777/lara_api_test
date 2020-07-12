<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected  $fillable = [
        'first_name', 'last_name', 'email', 'event_item_id'
    ];

    protected $attributes = [
    ];

    public function eventItem()
    {
        return $this->belongsTo('App\Models\EventItem');
    }
}
