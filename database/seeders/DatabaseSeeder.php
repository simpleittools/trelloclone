<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Column;
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
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'ryan',
//            'email' => 'ryan@test.test',
//        ]);
//
        $this->call([
            UserSeeder::class,
            BoardSeeder::class,
            ColumnSeeder::class,
            CardSeeder::class,
        ]);
    }
}
