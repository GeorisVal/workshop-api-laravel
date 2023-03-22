<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(MovieService $movieService)
    {
        $movies = $movieService->checkPage();

        for ($i = 0; $i < count($movies); $i++) {
            $movies[$i] = $movieService->retrieveExternMovieData($movies[$i]);
        }
    }
}
