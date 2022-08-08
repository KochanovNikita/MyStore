<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

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
        return self::getStatuses()[$this->status_id];
    }
}
