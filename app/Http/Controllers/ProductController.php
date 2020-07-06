<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(Request $request){
        $data = $request->validate([
                    'code' => 'required|string',
                    'name' => 'required|string',
                    'description' => 'string',
                    'price' => 'required',
                    'users_id' => 'required',
                    'categories_id' => 'required', 
                ]);
         
          Product::create($data); 
          return Product::all();      

    }
    

}
