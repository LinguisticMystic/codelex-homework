<?php

namespace App\Services;

use App\Repositories\PicturesRepository;
use App\Repositories\RatingsRepository;
use App\Repositories\UsersRepository;

class ShowRandomPictureService
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
        $userSex = $this->usersRepository->userSex($_SESSION['auth_id']);

        if ($userSex == 'male') {
            $oppositeSex = 'female';
        } else {
            $oppositeSex = 'male';
        }

        $usersOfOppositeSex = $this->usersRepository->findUsersOfOppositeSex($oppositeSex);

        //pick random
        $randomUserID = $this->pickRandomUserID($usersOfOppositeSex);
        //check previous rating
        $previousRating = $this->ratingsRepository->findRating($randomUserID);

//        while (!empty($previousRating)) {
//            $randomUserID = $this->pickRandomUserID($usersOfOppositeSex);
//            $previousRating = $this->ratingsRepository->findRating($randomUserID);
//        }

//        if (!$previousRating) {
//            //return ID
//        } else {
//            //pick another random ID
//            $randomUserID = $this->pickRandomUserID($usersOfOppositeSex);
//            //check...
//        }

        return [$randomUserID, $this->picturesRepository->getPathToMainPicture($randomUserID)];
    }

    private function pickRandomUserID(array $users): int
    {
        $randomNumber = rand(0, count($users) - 1);
        return $users[$randomNumber]['id'];
    }

}