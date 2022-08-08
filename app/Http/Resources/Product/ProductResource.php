<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Subcategory\SubcategoryResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = Product::where('company_id', $this->company_id)
            ->where('title', $this->title)
            ->where('id', '<>', $this->id)
            ->get();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'discount' => $this->discount,
            'price_with_discount' => $this->price_with_discount,
            'main_image' => $this->main_image_path,
            'images' => ImageResource::collection($this->images),
            'category' => new CategoryResource($this->category),
            'company' => new CompanyResource($this->company),
            'product_group' => MinProductResource::collection($products),
        ];
    }
}
