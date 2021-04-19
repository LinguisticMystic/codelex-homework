<?php

namespace App\Services;

use App\Models\Rating;
use App\Repositories\RatingsRepository;
use App\Repositories\UsersRepository;

class LikeService
{
    private UsersRepository $usersRepository;
    private RatingsRepository $ratingsRepository;

    public function __construct(
        UsersRepository $usersRepository,
        RatingsRepository $ratingsRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->ratingsRepository = $ratingsRepository;
    }

    public function execute()
    {
        return $rating = new Rating($_SESSION['auth_id'], 1, $_POST['rate']);

        //$this->ratingsRepository->likePicture($rating);
    }

}