<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(10, 250),
            'image' => $this->faker->imageUrl,
            'images' => [
                $this->faker->imageUrl,
                $this->faker->imageUrl,
                $this->faker->imageUrl
            ]
        ];
    }
}
