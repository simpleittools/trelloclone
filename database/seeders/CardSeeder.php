<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'user_id' => 1,
                'column_id' => 1,
                'title' => 'Card One',
                'notes' => '',
                'order' => 1,
            ],
            [
                'user_id' => 1,
                'column_id' => 1,
                'title' => 'Card Two',
                'notes' => '',
                'order' => 2,
            ],
            [
                'user_id' => 1,
                'column_id' => 1,
                'title' => 'Card Three',
                'notes' => '',
                'order' => 3,
            ],
        ];

        foreach ($cards as $card) {
            Card::factory()->create($card);
        }
    }
}
