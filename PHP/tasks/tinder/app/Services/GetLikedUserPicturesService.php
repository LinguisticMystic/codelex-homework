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

    public function execute(): array
    {
        $oppositeSex = $this->determineOppositeSex();
        $usersOfOppositeSex = $this->usersRepository->findUsersOfOppositeSex($oppositeSex);

        $randomUserID = $this->pickRandomUserID($usersOfOppositeSex);
        $previousRating = $this->ratingsRepository->findRating($randomUserID);

        while ($previousRating !== null) {
            $randomUserID = $this->pickRandomUserID($usersOfOppositeSex);
            $previousRating = $this->ratingsRepository->findRating($randomUserID);
        }

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

    private function pickRandomUserID(array $users): int
    {
        $randomNumber = rand(0, count($users) - 1);
        return $users[$randomNumber]['id'];
    }

}