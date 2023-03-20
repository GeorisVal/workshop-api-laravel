<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        / Single seed
        */
        Serie::factory()->create();

        /*
        / Multiple seed
        */
        Serie::factory()->count(10)->create();

        /*
         * Specific seed
         */
        Serie::factory()->create([
            'title' => 'Stargate SG1',
            'slug' => 'stargate-sg1',
            'description' => 'y trouve 1 porte ronde',
            'release_at' => '2000/03/24',
            'seasons' => '14',
            'episodes' => '150',
            'director' => 'General Hamond',
            'preview_image' => 'https://cdn.britannica.com/79/4679-050-BC127236/Titanic.jpg',
            'available' => 1
        ]);

        $series = Serie::all();

        foreach ($series as $serie) {
            $randomGenreId = DB::table('genres')
                ->inRandomOrder()
                ->limit(1)
                ->value('id');

            $randomTagsId = DB::table('tags')
                ->inRandomOrder()
                ->limit(rand(1, 5))
                ->get();

            $randomActors = DB::table('actors')
                ->inRandomOrder()
                ->limit(rand(1, 10))
                ->get();

            $randomSupports = DB::table('supports')
                ->inRandomOrder()
                ->limit(rand(1, 3))
                ->get();

            DB::table('link_genres')->insert([
                'id_movie' => null,
                'id_serie' => $serie->id,
                'id_genre' => $randomGenreId
            ]);

            foreach ($randomTagsId as $randomTagId) {
                DB::table('link_tags')->insert([
                    'id_movie' => null,
                    'id_serie' => $serie->id,
                    'id_tag' => $randomTagId->id
                ]);
            }

            foreach ($randomActors as $randomActor) {
                DB::table('link_actors')->insert([
                    'id_movie' => null,
                    'id_serie' => $serie->id,
                    'id_actor' => $randomActor->id
                ]);
            }

            foreach ($randomSupports as $randomSupport) {
                DB::table('link_supports')->insert([
                    'id_movie' => null,
                    'id_serie' => $serie->id,
                    'id_support' => $randomSupport->id
                ]);
            }

            $serieSupports = DB::table('link_supports')
                ->where('id_serie', '=', $serie->id)
                ->get();

            foreach ($serieSupports as $serieSupport) {
                DB::table('link_stocks')->insert([
                    'id_movie' => null,
                    'id_serie' => $serie->id,
                    'id_support' => $serieSupport->id_support,
                    'stock' => rand(0, 12)
                ]);
            }
        }
    }
}
