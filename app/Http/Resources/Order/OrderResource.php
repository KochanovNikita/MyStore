<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\User\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date = Carbon::parse($this->created_at);
        return [
            'id' => $this->id,
            'products' => $this->order_products,
            'total_price' => $this->total_price,
            'status' => $this->status_title,
            'status_id' => $this->status,
            'created_at' => $date->format('Y-m-d h:i')
        ];
    }
}
