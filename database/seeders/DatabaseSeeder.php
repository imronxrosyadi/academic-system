<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClazzSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            UserSeeder::class
        ]);
        // User::factory(3)->create();
    }
}
