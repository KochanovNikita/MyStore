<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{

    const KEY_WORD = 'key_word';

    protected function getCallbacks(): array
    {
        return [
            self::KEY_WORD => [$this, 'key_word'],
        ];
    }

    public function key_word(Builder $builder, $value) {
        $builder->where('name', 'LIKE', '%'.$value.'%')
            ->orWhere('email', 'LIKE', '%'.$value.'%')
            ->orWhere('phone', 'LIKE', '%'.$value.'%');
    }
}
