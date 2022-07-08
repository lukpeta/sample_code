<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text(150),
            'keywords' => $this->faker->text(150),
            'content' => $this->faker->realText,
            'is_enable' => $this->faker->boolean(50),
            'is_system' => $this->faker->boolean(20),
            'visibility_date_from' => $this->faker->dateTimeBetween('-3 months', '+6 months'),
            'visibility_date_to' => $this->faker->dateTimeBetween('+3 months', '+6 months'),
        ];
    }
}
