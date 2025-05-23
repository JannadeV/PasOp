<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Aanvraag;
use App\Models\Dierfoto;
use App\Models\Huisdier;
use App\Models\Huisfoto;
use App\Models\Oppastijd;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baasje = User::factory()->create([
            'name' => 'Baasje',
            'email' => 'baasje@example.com',
            'password' => Hash::make('password')
        ]);
        $yuri = $baasje->huisdiers()->create([
            'naam' => 'Yuri',
            'soort' => 'Hond',
        ]);
        $yuri->dierfotos()->create([
            'path' => 'images/yuri_trein.png'
        ]);
        $yuri->dierfotos()->create([
            'path' => 'images/yuri_bos.jpg'
        ]);
        $blubbie = $baasje->huisdiers()->create([
            'naam' => 'Blubbie',
            'soort' => 'Vis',
        ]);
        $blubbie->dierfotos()->create([
            'path' => 'images/blubbie.png'
        ]);

        $yuri->oppastijds()->create([
            'datum' => '2024-04-19',
            'start' => '15:00',
            'eind' => '22:30',
        ]);
        $oppastijd = $yuri->oppastijds()->create([
            'datum' => '2024-05-18',
            'start' => '7:30',
            'eind' => '13:00',
        ]);

        $oppasser = User::factory()->create([
            'name' => 'Oppasser',
            'email' => 'oppasser@example.com',
            'password' => Hash::make('password')
        ]);

        $aanvraag = $oppastijd->aanvraags()->create([
            'oppasser_id' => $oppasser->id,
        ]);
        $aanvraag->huisfotos()->create([
            'path' => 'images/osso.png',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role' => "admin"
        ]);
    }
}
