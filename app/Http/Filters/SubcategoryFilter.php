<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class SubcategoryFilter extends AbstractFilter
{
    const TITLE = 'title';
    const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CATEGORY_ID => [$this, 'category_id'],
        ];
    }

    public function title(Builder $builder, $value) {
        $builder->where('title', 'LIKE', '%'.$value.'%');
    }

    public function category_id(Builder $builder, $value) {
        $builder->whereHas('category', function($c) use ($value) {
            $c->where('category_id', $value);
        });
    }
}
