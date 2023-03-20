# Workshop API Movies/Series

## Installation

### Install Sail from the repository

`docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs`

<br>

## Movies

- **MovieController / MovieService**
  - method index(): **MovieController**
    - method checkPage(): **MovieService**
    - method retrieveExternMovieData: **MovieService**
      - method retrieveGenres()
      - method 
<br>
