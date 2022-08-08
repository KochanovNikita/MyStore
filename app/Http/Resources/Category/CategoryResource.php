<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Subcategory\SubcategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subcategories' => SubcategoryResource::collection($this->subcategories),
        ];
    }
}
