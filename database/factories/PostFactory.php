<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(10    ),
            'slug' => $this->faker->slug,
            'description' => $this->faker->realTextBetween(100, 300),
            'isActive' => 0,
            'category_id' => 2,
        ];
    }
}
