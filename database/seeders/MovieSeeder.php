<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        / Single seed
        */
        Movie::factory()->create();

        /*
        / Multiple seed
        */
        Movie::factory()->count(100)->create();

        /*
         * Specific seed
         */
        Movie::factory()->create([
            'title' => 'Titanic',
            'slug' => 'titanic',
            'description' => 'le bato koul',
            'release_at' => '1998/08/14',
            'duration' => '442',
            'director' => 'Bob Marley',
            'preview_image' => 'https://cdn.britannica.com/79/4679-050-BC127236/Titanic.jpg',
            'available' => 1
        ]);

        $movies = Movie::all();

        foreach ($movies as $movie) {
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
                'id_movie' => $movie->id,
                'id_serie' => null,
                'id_genre' => $randomGenreId
            ]);

            foreach ($randomTagsId as $randomTagId) {
                DB::table('link_tags')->insert([
                    'id_movie' => $movie->id,
                    'id_serie' => null,
                    'id_tag' => $randomTagId->id
                ]);
            }

            foreach ($randomActors as $randomActor) {
                DB::table('link_actors')->insert([
                    'id_movie' => $movie->id,
                    'id_serie' => null,
                    'id_actor' => $randomActor->id
                ]);
            }

            foreach ($randomSupports as $randomSupport) {
                DB::table('link_supports')->insert([
                    'id_movie' => $movie->id,
                    'id_serie' => null,
                    'id_support' => $randomSupport->id
                ]);
            }

            $movieSupports = DB::table('link_supports')
                ->where('id_movie', '=', $movie->id)
                ->get();

            foreach ($movieSupports as $movieSupport) {
                DB::table('link_stocks')->insert([
                    'id_movie' => $movie->id,
                    'id_serie' => null,
                    'id_support' => $movieSupport->id_support,
                    'stock' => rand(0, 12)
                ]);
            }
        }
    }
}
