<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category as CategoryResource;
use App\Category;
class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'  => $this->name,
            'code' =>$this->code,
            'description' =>$this->description,
            'price' => $this->price,
            'user'=>$this->users,
            'category' => new CategoryResource(Category::find($this->categories_id)),
            'image' => $this->image,
        ];
    }
}
