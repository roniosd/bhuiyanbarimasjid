<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(200),
            'featured_photo' => now()->format('YmdHis') . rand(1, 9) . '.jpg',
            'show_membership' => $this->faker->boolean(),
            'donation_info' => $this->faker->optional()->text(100),
            'show_payment_method' => $this->faker->boolean(),
            'donation_unit' => $this->faker->randomFloat(2, 10, 9999),
            'status' => $this->faker->randomElement(['active', 'inactive']),

        ];
    }
}
