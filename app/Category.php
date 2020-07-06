<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{

// DECLARATION
    use SoftDeletes;
    protected $guarded = [];

// SCOPED FUNCTIONS 
    public function scopeIsActive($query){
        return $query->where('IsActive','=',1);
    }

// ELOQUENT RELATIONAL
    public function products(){
        return $this->hasMany('App\Product');
    }
}
