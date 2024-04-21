<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productName = [

        ];

        return [
            'product_name' => $this->faker->text(15),
            'product_price' => $this->faker->randomNumber(4, false),
            'product_image' => $this->faker->imageUrl(),
            'product_description' => $this->faker->paragraphs(2, true),
            'product_status' => 1
        ];
    }
}
