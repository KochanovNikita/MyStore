<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Color;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //echo public_path('\images\products\\');
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence(1),
            'content' => $this->faker->sentence(6),
            'price' => random_int(5, 110),
            'discount' => 0,
            'count' => 1000,
            'category_id' => Category::factory(),
            'company_id' => Company::factory(),
            'color_id' => Color::factory(),
            'main_image' => 'images/products/no-image.jpg',
            'preview_image' => 'images/products/no-image.jpg',
        ];
    }
}
