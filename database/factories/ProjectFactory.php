<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(5, true),
            'description' => fake()->realTextBetween(250, 1000),
            'ends_at' => fake()->dateTimeBetween('now', '+5 days'),
            'status' => fake()->randomElement(['open', 'closed']),
            'tech_stack' => fake()->randomElements([
                'nodejs',
                'react',
                'javascript',
                'vite',
                'nextjs'
            ], random_int(1, 5)),
            'created_by' => User::factory(),
        ];
    }
}
