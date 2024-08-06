<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    public function run(): void
    {
        $columns = [
            [
                'user_id' => 1,
                'board_id' => 1,
                'title' => "Column One",
                'order' => 1
            ],
            [
                'user_id' => 1,
                'board_id' => 1,
                'title' => "Column Two",
                'order' => 2
            ],
            [
                'user_id' => 1,
                'board_id' => 1,
                'title' => "Column Three",
                'order' => 3
            ],

        ];
        foreach ($columns as $column) {
            Column::factory()->create($column);
        }
    }

}
