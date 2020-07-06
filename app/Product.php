<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

// / ELOQUENT RELATIONAL
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
}
