<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    //
    protected  $fillable = [
        'title'
    ];

    protected $attributes = [
    ];

    public function members() {
        return $this->hasMany('App\Models\Member');
    }
}
