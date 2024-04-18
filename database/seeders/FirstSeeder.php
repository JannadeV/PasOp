<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $baasje = User::factory()->create([
            'name' => 'Baasje',
            'email' => 'baasje@example.com',
        ]);
        $yuri = $baasje->huisdiers()->create([
            'naam' => 'Yuri',
            'soort' => 'Hond',
        ]);
        $yuri->dierfotos()->create([
            'path' => 'img/yuri_trein.png',
        ]);

        $yuri->oppastijds()->create([
            'start' => '2024-04-18 15:00:00',
            'eind' => '2024-04-18 22:30:00',
        ]);
        $oppastijd = $yuri->oppastijds()->create([
            'start' => '2024-04-18 7:30:00',
            'eind' => '2024-04-18 13:00:00',
        ]);

        $oppasser = User::factory()->create([
            'name' => 'Oppasser',
            'email' => 'oppasser@example.com',
        ]);

        $aanvraag = $oppastijd->aanvraags()->create([
            'oppasser_id' => $oppasser->id,
        ]);
        $aanvraag->huisfotos()->create([
            'path' => 'img/osso.png',
        ]);

        $reviewer = User::factory()->create([
            'name' => 'Reviewer',
            'email' => 'reviewer@example.com',
        ]);
        $oppasser->reviewsGot()->create([
            'baasje_id' => $reviewer->id,
            'rating' => '4',
        ]);
    }
}
