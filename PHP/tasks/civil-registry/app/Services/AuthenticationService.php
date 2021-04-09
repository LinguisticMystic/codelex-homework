<?php

namespace App\Services;

use App\Models\Token;
use App\Repositories\PersonsRepository;
use App\Repositories\TokensRepository;

class AuthenticationService
{
    private PersonsRepository $personsRepository;
    private TokensRepository $tokensRepository;

    public function __construct(PersonsRepository $personsRepository, TokensRepository $tokensRepository)
    {
        $this->personsRepository = $personsRepository;
        $this->tokensRepository = $tokensRepository;
    }

    public function execute(): string
    {
        $link = 'localhost:8080/auth?token=';

        if (!empty($_POST['authenticate'])) {
            $result = $this->personsRepository->findPersonBySocialNumber($_POST['authenticate']);

            if (!empty($result)) {

                $token = new Token($result[0]['id']);
                $this->tokensRepository->addToken($token);

                $_SESSION['_message'] = 'Token generated!';
                return $link . $token->key();

            } else {
                $_SESSION['_message'] = 'No such ID found.';
            }

        } else unset($_SESSION['_message']);
        return '';
    }
}