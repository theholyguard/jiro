<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'content' => $this->faker->paragraph,
        'ticket_id' => \App\Models\Ticket::factory(),
        'user_id' => \App\Models\User::factory(),
    ];
}

}
