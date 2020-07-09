<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transbody;
use App\Transheader;
use App\Product;

use Illuminate\Support\Str;



class TransactionController extends Controller
{
    public function Saveheader(){
       
        $transheaders = new Transheader;
        $transheaders->transno = Str::random(8);
        $transheaders->transdate = Now() ;
        $transheaders->users_id = 1;
        $transheaders->companies_id = 1;
        $transheaders->isCancel = 0;
        $transheaders->items = 1; 
        $transheaders->save();
        return $transheaders->id;
        
    }
    public function Savebody(){
        $header = Transheader::find($this->Saveheader());
        $body = new Transbody;
        $body->transheader_id = 1; 
        $body->products_id = 1;
        $body->price = 120;
        $body->quantity = 100;
        $body->subtotal = 100;
        $body->isVoid = 0;  
        return $header->transbody()->save($body);
    }
    public function Canceltransaction(){
        $transheaders = new Transheader;
        $transheaders->transno = Str::random(8);
        $transheaders->transdate = Now() ;
        $transheaders->users_id = auth()->user()->id;
        $transheaders->companies_id = 1;
        $transheaders->isCancel = 1;
        $transheaders->items = 1; 
        $transheaders->save();
        return $transheaders->id;
    }
    public function VoidOrder(){
        
    }
    public function Lookup(){
        return $products = Product::all();
    }
    
}
