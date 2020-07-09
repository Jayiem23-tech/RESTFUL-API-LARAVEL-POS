<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transheader extends Model
{
    public function transbody(){
        return $this->hasOne('App\Transbody');
    }
}
