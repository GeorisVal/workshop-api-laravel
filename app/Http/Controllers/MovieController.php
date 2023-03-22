<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(MovieService $movieService)
    {
        $movies = $movieService->checkPage();

        for ($i = 0; $i < count($movies); $i++) {
            $movies[$i] = $movieService->retrieveExternMovieData($movies[$i]);
        }

        return response()->json([
            'movies' => $movies
        ]);
    }

    public function showAll(MovieService $movieService, bool $calledInClass = false): Collection|JsonResponse
    {
        $movies = Movie::all();

        for ($i = 0; $i < count($movies); $i++) {
            $movies[$i] = $movieService->retrieveExternMovieData($movies[$i]);
        }

        if ($calledInClass) {
            return $movies;
        }

        return response()->json([
            'movies' => $movies
        ]);
    }
}
