<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{
    const USER = 'user';
    const PRICES = 'prices';
    const PRICE = 'price';
    const TIME = 'time';


    protected function getCallbacks(): array
    {
        return [
            self::USER => [$this, 'user'],
            self::PRICES => [$this, 'prices'],
            self::PRICE => [$this, 'price'],
            self::TIME => [$this, 'time'],
        ];
    }

    public function user(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%")
            ->orWhere('phone', 'like', "%{$value}%");
    }

    public function prices(Builder $builder, $value)
    {
        $builder->whereBetween('total_price', $value);
    }

    public function price(Builder $builder, $value)
    {
        if($value == 1) {
            $builder->orderBy('total_price', 'desc');
        }
        if($value == 2) {
            $builder->orderBy('total_price', 'asc');
        }
    }

    public function time(Builder $builder, $value)
    {
        if($value == 1) {
            $builder->orderBy('created_at', 'desc');
        }
        if($value == 2) {
            $builder->orderBy('created_at', 'asc');
        }
    }

}
