<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating = 'PG')
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

}

class MovieCollection
{
    private array $movies = [];

    public function addMovie(Movie $movie): void
    {
        $this->movies[] = $movie;
    }

    public function addMovieArray(array $movies): void
    {
        foreach ($movies as $movie) {
            $this->addMovie($movie);
        }
    }

    public function getPG(): array
    {
        return array_filter($this->movies, function (Movie $movie) {
            return $movie->getRating() === 'PG';
        });
    }

}

$movieShelf = new MovieCollection();

$movieShelf->addMovieArray([
    new Movie('Casino Royale', 'Eon Productions', 'PG­13'),
    new Movie('Glass', 'Buena Vista International', 'PG­13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures'),
]);

echo 'PG rated movies:' . PHP_EOL;
foreach ($movieShelf->getPG() as $movie) {
    echo $movie->getTitle() . PHP_EOL;
}