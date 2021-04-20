<?php

namespace App\Services;

use App\Repositories\PicturesRepository;
use App\Repositories\RatingsRepository;
use App\Repositories\UsersRepository;

class GetRandomUserInfoService
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

    public function execute($userID): array
    {
        $oppositeSex = $this->determineOppositeSex();

        $randomUserArray = $this->usersRepository->pickRandomUserID($userID, $oppositeSex);

        if (empty($randomUserArray)) {
            return [];
        }

        $randomUserID = $randomUserArray[rand(0, count($randomUserArray) - 1)]['id'];

        $randomUsername = $this->usersRepository->findUsername($randomUserID);

        return [$randomUserID, $randomUsername, $this->picturesRepository->getPathToMainPicture($randomUserID)];
    }

    private function determineOppositeSex(): string
    {
        $userSex = $this->usersRepository->userSex($_SESSION['auth_id']);

        if ($userSex == 'male') {
            $oppositeSex = 'female';
        } else {
            $oppositeSex = 'male';
        }

        return $oppositeSex;
    }

}