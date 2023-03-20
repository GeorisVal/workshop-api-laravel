<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        / Single seed
        */
        // Actor::factory()->create();

        /*
        / Multiple seed
        */
        Actor::factory()->count(500)->create();

        /*
        / Specific seed
        */
        Actor::factory()->create([
            'firstname' => 'Bob',
            'lastname' => 'Marley',
            'bio' => 'This is Bob Marley',
            'profile_pic' => 'https://preview.redd.it/xk2ne9pw65a81.jpg?auto=webp&s=b0366d636211c010db2c56cdd5b8819d3d531b3c'
        ]);
    }
}
