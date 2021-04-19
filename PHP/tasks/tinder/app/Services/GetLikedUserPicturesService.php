<?php

namespace App\Services;

use App\Repositories\PicturesRepository;
use App\Repositories\RatingsRepository;
use App\Repositories\UsersRepository;

class GetLikedUserPicturesService
{
    private UsersRepository $usersRepository;
    private PicturesRepository $picturesRepository;
    private RatingsRepository $ratingsRepository;

    public function __construct(
        UsersRepository $usersRepository,
        PicturesRepository $picturesRepository,
        RatingsRepository $ratingsRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->picturesRepository = $picturesRepository;
        $this->ratingsRepository = $ratingsRepository;
    }

    public function execute(int $userID): array
    {
        $likedUserIDs = $this->ratingsRepository->findLikedUsers($userID);

        return $this->picturesRepository->getPathsToLikedPictures($likedUserIDs);
    }

}