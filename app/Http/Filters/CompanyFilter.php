<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CompanyFilter extends AbstractFilter
{
    const TITLE = 'title';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
        ];
    }

    public function title(Builder $builder, $value) {
        $builder->where('title', 'LIKE', '%'.$value.'%');
    }
}
