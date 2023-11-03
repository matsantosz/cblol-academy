<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            exit();
        }

        User::factory()->create(['email' => 'test@example.com']);

        Profile::factory(100)->public()->create();
    }
}
