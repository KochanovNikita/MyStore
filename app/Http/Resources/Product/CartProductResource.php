<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
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
            'description' => $this->description,
            'preview_image' => $this->preview_image_path,
            'color' => new ColorResource($this->color),
            'category' => new CategoryResource($this->category),
            'gender' => $this->gender_title,
        ];
    }
}
