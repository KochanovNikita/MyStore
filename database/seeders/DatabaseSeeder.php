<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(100)->create();
        \App\Models\Category::factory(1)->create();
        \App\Models\Subcategory::factory(4)->create();
        \App\Models\Color::factory(4)->create();
        \App\Models\Company::factory(4)->create();
        \App\Models\Product::factory(40)->create();
    }
}
