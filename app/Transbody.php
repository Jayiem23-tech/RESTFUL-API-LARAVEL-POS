<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transbody extends Model
{
    public function transheaders(){
        return $this->belongsTo('App\Transheader');
    }
}
