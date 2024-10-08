<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{
    Project,
    User
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(200)->create();

        User::query()->inRandomOrder()->limit(10)->get()->each(function (User $user) {
            Project::factory()->create(['created_by' => $user->id]);
        });
    }
}
