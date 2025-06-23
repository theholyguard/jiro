<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Création de 10 utilisateurs
    \App\Models\User::factory(10)->create()->each(function ($user) {
        // Chaque utilisateur a entre 1 et 3 projets
        \App\Models\Project::factory(rand(1, 3))->create([
            'user_id' => $user->id,
        ])->each(function ($project) use ($user) {
            // Chaque projet a entre 3 et 6 tickets
            \App\Models\Ticket::factory(rand(3, 6))->create([
                'project_id' => $project->id,
                'user_id' => $user->id,
            ])->each(function ($ticket) use ($user) {
                // Ajout de 1 à 5 commentaires par ticket
                \App\Models\Comment::factory(rand(1, 5))->create([
                    'ticket_id' => $ticket->id,
                    'user_id' => $user->id,
                ]);
            });
        });
    });

    // Création de 10 tags
    $tags = \App\Models\Tag::factory(10)->create();

    // Ajout aléatoire de tags aux tickets
    \App\Models\Ticket::all()->each(function ($ticket) use ($tags) {
        $ticket->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
    });
}

}
