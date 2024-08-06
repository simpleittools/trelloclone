<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    public function run(): void
    {
        $boards = [
            [
                'user_id' => '1',
                'title' => "Project",
            ],

        ];
        foreach ($boards as $board) {
            Board::factory()->create($board);
        }

    }

}
