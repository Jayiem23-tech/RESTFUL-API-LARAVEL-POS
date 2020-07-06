<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => []]);
    }
    public function register(Request $request){
        try {  
        // VALIDATE RECORDD
            $request->validate([
                'code' => 'required|min:3',
                'name' =>'required|min:3',
                'isActive' => ''
            ]); 
        // 
        //  UPDATE DATA IF REQUEST HAVE AN ID ELSE SAVE/ADD
        // 
            if ($request->id) { 
                $categories = Category::find($request->id);
            }else{
                $categories = new Category;
            }  
            $categories->code = $request->code;
            $categories->name =  $request->name;
            $categories->IsActive =  $request->IsActive; 
            $result = $categories->save(); 

            // SAVED OR NOT
            if ($result == 0) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }else{ 
                return Category::IsActive()->get();
            }  
        } catch (\Throwable $th) {
            throw $th;
        } 
    } 
    public function remove(Request $request){ 
        $categories = Category::find($request->id);
        $categories->delete();
        return response()->json(['messages'=>'Deleted!']);
    }
}
