<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    } 
    public function register(Request $request){ 
        $data = $request->validate([  
            'name' => "String",
            'code' => "String",
            'description' => "String",
            'price' => 'required',
            'users_id' => 'required',
            'categories_id' => 'required',  
        ]);  
        if (!$request->id) { 
            // validation  
                if ($request->hasFile('image')) {
                    $data_image = $request->validate([
                        'image'=>'file|image'
                    ]);
                }
              // STORE DATA 
              $products = Product::create($data); 
              $ProductImage = Product::find($products->id);
              $imagePath = $request->image->store('uploads','public'); 
              $ProductImage->image = $imagePath;
              $image =  Image::make(public_path("storage/{$imagePath}")); 
              $image->save();
              $ProductImage->save(); 
              return response()->json(["Message"=>"Added!"]);
            }else{ 
                    $products = Product::find($request->id);
                    $products->name = $request->name; 
                    $products->code = $request->code;
                    $products->description = $request->description;
                    $products->price = $request->price;
                    $products->save();
                     
                        if ($request->hasFile('image')) {
                            $data_image = $request->validate([
                                'image'=>'file|image'
                            ]);
                        }
                    $ProductImage = Product::find($products->id);
                    $imagePath = $request->image->store('uploads','public'); 
                    $ProductImage->image = $imagePath;
                    $image =  Image::make(public_path("storage/{$imagePath}")); 
                    $image->save();
                    $ProductImage->save();
                    return response()->json(["Message"=>"Updated!"]);
                } 
            }
        } 
