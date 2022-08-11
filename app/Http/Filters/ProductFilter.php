<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const TITLE = 'title';
    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const SUBCATEGORIES = 'subcategories';
    const COMPANIES = 'companies';
    const GROUPS = 'groups';
    const GENDER_ID = 'gender_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::SUBCATEGORIES => [$this, 'subcategories'],
            self::COMPANIES => [$this, 'companies'],
            self::GROUPS => [$this, 'groups'],
            self::GENDER_ID => [$this, 'gender_id'],
        ];
    }

    public function title(Builder $builder, $value) {
        $builder->where('title', 'LIKE', '%'.$value.'%');
    }

    public function categories(Builder $builder, $categories) {
        $builder->whereIn('category_id', $categories);
    }

    public function subcategories(Builder $builder, $subcategories) {
        $builder->whereHas('subcategories', function($b) use($subcategories) {
            $b->whereIn('subcategory_id', $subcategories);
        });
    }

    public function colors(Builder $builder, $colors) {
        $builder->whereIn('color_id', $colors);
    }

    public function companies(Builder $builder, $companies) {
        $builder->whereIn('color_id', $companies);
    }

    public function gender_id(Builder $builder, $gender_id) {
        $builder->where('gender_id', $gender_id);
    }
}
