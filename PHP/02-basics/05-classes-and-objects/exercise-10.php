<?php

class Application
{
    function run(VideoStore $store)
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies($store);
                    break;
                case 2:
                    $this->rentVideo($store);
                    break;
                case 3:
                    $this->returnVideo($store);
                    break;
                case 4:
                    $this->listInventory($store);
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(VideoStore $store): void
    {
        $store->addVideo(new Video(readline('Enter movie title to add: ')));
    }

    private function rentVideo(VideoStore $store): void
    {
        $store->checkOutVideo(readline('Enter movie title to rent: '));
    }

    private function returnVideo(VideoStore $store): void
    {
        $store->returnVideo(readline('Enter movie title to return: '));
    }

    private function listInventory(VideoStore $store): void
    {
        $store->printInventory();
    }
}

class VideoStore
{
    private string $name;
    public array $inventory = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addVideo(Video $video): void
    {
        $this->inventory[] = $video;
    }

    public function addVideoArray($videos): void
    {
        foreach ($videos as $video) {
            $this->addVideo($video);
        }
    }

    public function checkOutVideo(string $videoTitle): void
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->checkOut();
            }
        }
    }

    public function returnVideo(string $videoTitle): void
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->checkIn();
            }
        }
    }

    public function rateVideo(string $videoTitle, int $rating): void
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $videoTitle) {
                $video->rate($rating);
            }
        }
    }

    public function printInventory(): void
    {
        foreach ($this->inventory as $key => $video) {
            echo "[$key] {$video->getTitle()}. Rating: {$video->getAverageRating()}. Available: {$video->getStatus()}." . PHP_EOL;
        }
    }

}

class Video
{
    private string $title;
    private bool $checkedOut;
    private array $ratings = [];

    public function __construct(string $title, bool $checkedOut = false)
    {
        $this->title = $title;
        $this->checkedOut = $checkedOut;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStatus(): string
    {
        return $this->checkedOut ? "NO" : "YES";
    }

    public function checkOut(): void
    {
        $this->checkedOut = true;
    }

    public function checkIn(): void
    {
        $this->checkedOut = false;
    }

    public function rate(int $rating): void
    {
        if ($rating < 0 || $rating > 5) return;
        $this->ratings[] = $rating;
    }

    public function getAverageRating(): float
    {
        if (count($this->ratings) > 0) {
            return number_format(array_sum($this->ratings) / count($this->ratings), 2);
        } else {
            return 0;
        }
    }

}

$movieWorld = new VideoStore('Movie World');

$movieWorld->addVideoArray([
    $matrix = new Video('The Matrix'),
    $godfather = new Video('Godfather II'),
    $starWars = new Video('Star Wars Episode IV: A New Hope')
]);

$movieWorld->rateVideo('The Matrix', 5);
$movieWorld->rateVideo('The Matrix', 4.5);
$movieWorld->rateVideo('The Matrix', 4.8);
$movieWorld->rateVideo('The Matrix', 4);

$movieWorld->rateVideo('Godfather II', 5);
$movieWorld->rateVideo('Godfather II', 5);
$movieWorld->rateVideo('Godfather II', 4.6);

$movieWorld->rateVideo('Star Wars Episode IV: A New Hope', 4.7);
$movieWorld->rateVideo('Star Wars Episode IV: A New Hope', 3);

$movieWorld->checkOutVideo('Godfather II');

//$movieWorld->printInventory();


$app = new Application();
$app->run($movieWorld);