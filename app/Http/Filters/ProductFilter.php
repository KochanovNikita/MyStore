<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const TITLE = 'title';
    const CATEGORIES = 'categories';
    const CATEGORY_ID = 'category_id';
    const COLORS = 'colors';
    const COLOR_ID = 'color_id';
    const SUBCATEGORIES = 'subcategories';
    const SUBCATEGORY_ID = 'subcategory_id';
    const COMPANIES = 'companies';
    const COMPANY_ID = 'company_id';
    const GROUPS = 'groups';
    const GROUP_ID = 'group_id';
    const PRICES = 'prices';
    const GENDER_ID = 'gender_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CATEGORIES => [$this, 'categories'],
            self::CATEGORY_ID => [$this, 'category_id'],
            self::COLORS => [$this, 'colors'],
            self::COLOR_ID => [$this, 'color_id'],
            self::SUBCATEGORIES => [$this, 'subcategories'],
            self::SUBCATEGORY_ID => [$this, 'subcategory_id'],
            self::GROUP_ID => [$this, 'group_id'],
            self::COMPANIES => [$this, 'companies'],
            self::COMPANY_ID => [$this, 'company_id'],
            self::GROUPS => [$this, 'groups'],
            self::GROUP_ID => [$this, 'group_id'],
            self::GENDER_ID => [$this, 'gender_id'],
            self::PRICES => [$this, 'prices']
        ];
    }

    public function title(Builder $builder, $value) {
        $builder->where('title', 'LIKE', '%'.$value.'%');
    }

    public function categories(Builder $builder, $categories) {
        $builder->whereIn('category_id', $categories);
    }

    public function category_id(Builder $builder, $category_id) {
        $builder->where('category_id', $category_id);
    }

    public function subcategories(Builder $builder, $subcategories) {
        $builder->whereHas('subcategories', function($b) use($subcategories) {
            $b->whereIn('subcategory_id', $subcategories);
        });
    }

    public function subcategory_id(Builder $builder, $subcategory_id) {
        $builder->whereHas('subcategories', function($b) use($subcategory_id){
            $b->where('subcategory_id', $subcategory_id);
        });
    }

    public function colors(Builder $builder, $colors) {
        $builder->whereIn('color_id', $colors);
    }

    public function color_id(Builder $builder, $color_id) {
        $builder->where('color_id', $color_id);
    }

    public function companies(Builder $builder, $companies) {
        $builder->whereIn('company_id', $companies);
    }

    public function company_id(Builder $builder, $company_id) {
        $builder->where('company_id', $company_id);
    }

    public function gender_id(Builder $builder, $gender_id) {
        $builder->where('gender_id', $gender_id);
    }

    public function group_id(Builder $builder, $group_id) {
        $builder->where('group_id', $group_id);
    }

    public function prices(Builder $builder, $prices) {
        $builder->whereBetween('price', $prices);
    }

    public function groups(Builder $builder, $groups) {
        $builder->whereIn('group_id', $groups);
    }
}
