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

    public function getPG(array $movies): array
    {
        return array_filter($movies, function (Movie $movie) {
            return $movie->rating === 'PG';
        });
    }

}

$casinoRoyale = new Movie('Casino Royale', 'Eon Productions', 'PG­13');
$glass = new Movie('Glass', 'Buena Vista International', 'PG­13');
$spiderMan = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures');

$movies = [
    $casinoRoyale,
    $glass,
    $spiderMan
];

print_r($casinoRoyale->getPG($movies));