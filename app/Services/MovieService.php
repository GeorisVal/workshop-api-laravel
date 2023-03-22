<?php

namespace App\Services;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Support;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class MovieService
{
    public function checkPage(): Collection
    {
        $movies = Movie::all()->take(20);
        $page = request('page');

        if ($page) {
            $movies = DB::table('movies')
                ->whereBetween('id', [$page * 20 - 20, $page * 20])
                ->get();
        }

        return $movies;
    }

    public function retrieveExternMovieData(stdClass|Movie $movie)
    {
        $movie->genre = $this->retrieveGenre($movie->id);

        $movie->tags = $this->retrieveTags($movie->id);

        $movie->cast = $this->retrieveCast($movie->id);

        $movie->supports = $this->retrieveSupports($movie->id);

        $movie->stocks = $this->retrieveStock($movie->id);

        return $movie;
    }

    private function retrieveGenre(int $idMovie): string
    {
        $idGenre = DB::table('link_genres')
            ->where('id_movie', '=', $idMovie)
            ->value('id_genre');

        $genre = Genre::find($idGenre);

        return $genre->name;
    }

    private function retrieveTags(int $idMovie): array
    {
        $idTags = DB::table('link_tags')
            ->where('id_movie', '=', $idMovie)
            ->get();

        $movieTags = [];

        foreach ($idTags as $idTag) {
            $tag = Tag::find($idTag->id_tag);
            $movieTags[] = $tag->name;
        }

        return $movieTags;
    }

    private function retrieveCast(int $idMovie): array
    {
        $idActors = DB::table('link_actors')
            ->where('id_movie', '=', $idMovie)
            ->get();

        $cast = [];

        foreach ($idActors as $idActor) {
            $cast[] = Actor::find($idActor->id_actor);
        }

        return $cast;
    }

    private function retrieveSupports(int $idMovie): array
    {
        $idSupports = DB::table('link_supports')
            ->where('id_movie', '=', $idMovie)
            ->get();

        $supports = [];

        foreach ($idSupports as $idSupport) {
            $support = Support::find($idSupport->id_support);
            $supports[] = $support->name;
        }

        return $supports;
    }

    private function retrieveStock(int $idMovie): array
    {
        $idStocks = DB::table('link_stocks')
            ->where('id_movie', '=', $idMovie)
            ->get();

        $stocks = [];

        foreach ($idStocks as $idStock) {
            $support = Support::find($idStock->id_support);

            $stocks[] = [
                'support' => $support->name,
                'stock' => $idStock->stock
            ];
        }

        return $stocks;
    }
}
