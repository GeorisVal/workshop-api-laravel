# Workshop API Movies/Series : Working Plan

## Preparation

### To visualize the datas

- Extension JSON Formatter
- Postman

## Installation

### Install Sail from the repository

`docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs`

## Movies

### MovieController / MovieService

  - method index(): **MovieController**
    - method checkPage(): **MovieService**
    - method retrieveExternMovieData: **MovieService**
      - method retrieveGenres()
      - method retrieveTags()
      - method retrieveCast()
      - method retrieveSupports()
      - method retrieveStocks()
    - define the `/movies` route <br><br>
  - method showAll(): **MovieController** 
    - define the `/movies/all` route <br><br>
  - method show(): **MovieController** 
    - method retrieveSimilar(): **MovieService**
    - define the `/movies/{id}` route

<br>

## Series

- **SerieController / SerieService**
  - method index(): **SerieController**
    - method checkPage(): **SerieService**
    - method retrieveExternSerieData: **SerieService**
      - method retrieveGenres()
      - method retrieveTags()
      - method retrieveCast()
      - method retrieveSupports()
      - method retrieveStocks()
    - define the `/series` route <br><br>
  - method showAll(): **SerieController**
    - define the `/series/all` route <br><br>
  - method show(): **SerieController**
      - method retrieveSimilar(): **SerieService**
  - define the `/series/{id}` route

<br>

## Tags

- **TagController / TagService**
  - method index(): **TagController**
    - method retrieveAll(): **TagService**
  - define the `/tags` route <br><br>
  - method showSerie(): **TagController**
    - method retrieveSeries(): **TagService**
      - method exist()
  - define the `/series/tags/{id}` route <br><br>
  - method showMovies(): **TagController**
      - method retrieveMovies(): **TagService**
        - method exist()
  - define the `/movies/tags/{id}` route

## Supports

- **SupportController / SupportService**
    - method index(): **SupportController**
        - method retrieveAll(): **SupportService**
    - define the `/supports` route <br><br>
    - method showSerie(): **SupportController**
        - method retrieveSeries(): **SupportService**
            - method exist()
    - define the `/series/supports/{id}` route <br><br>
    - method showMovies(): **SupportController**
        - method retrieveMovies(): **SupportService**
            - method exist()
    - define the `/movies/supports/{id}`

## Genres

- **GenreController / GenreService**
    - method index(): **GenreController**
        - method retrieveAll(): **GenreService**
    - define the `/genres` route <br><br>
    - method showSerie(): **GenreController**
        - method retrieveSeries(): **GenreService**
            - method exist()
    - define the `/series/genres/{id}` route <br><br>
    - method showMovies(): **GenreController**
        - method retrieveMovies(): **GenreService**
            - method exist()
    - define the `/movies/genres/{id}`

## Actors

- **ActorController / ActorService**
    - method index(): **ActorController**
        - method retrieveAll(): **ActorService**
    - define the `/actors` route <br><br>
    - method show(): **ActorController**
        - method retrieveSeries(): **ActorService**
            - method exist()
        - method retrieveMovies(): **ActorService**
          - method exist()
    - define the `/actors/{id}` route

## Directors

- **DirectorController / DirectorService**
    - method index(): **DirectorController**
        - method retrieveAll(): **ActorService**
    - define the `/directors` route <br><br>
    - method show(): **DirectorController**
        - method retrieveSeries(): **DirectorService**
            - method exist()
        - method retrieveMovies(): **DirectorService**
            - method exist()
    - define the `/directors/{id}` route
