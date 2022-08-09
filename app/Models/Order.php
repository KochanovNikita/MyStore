<?php

namespace App\Models;

use App\Http\Resources\Product\CartProductResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status_id',
    ];

    const STATUS_WAITING = 0;
    const STATUS_SENT = 1;
    const STATUS_DELIVERED = 2;

    public static function getStatuses() {
        return [
            self::STATUS_WAITING => 'Ждет отправки',
            self::STATUS_SENT => 'Отправлен',
            self::STATUS_DELIVERED => 'Доставлен',
        ];
    }

    public function getStatusTitleAttribute() {
        return self::getStatuses()[$this->status];
    }

    public function getOrderProductsJsonAttribute() {
        $orders = json_decode($this->products);
        foreach ($orders as $order) {
            $product = Product::where('id',  $order->id)->firstOrFail();
            $order->product = new CartProductResource($product);
        }
        return $orders;
    }

    /* public function getCreatedAtCarbonAttribute() {
        return Carbon::parse($this->cre)
    } */

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
