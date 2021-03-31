<?php

namespace App\Controllers;

use App\Services\FindPersonByAddressService;
use App\Services\FindPersonByAgeService;
use App\Services\FindPersonByNameService;
use App\Services\FindPersonBySocialNumberService;
use Twig\Environment;

class SearchResultsController
{
    private Environment $environment;
    private FindPersonByNameService $nameService;
    private FindPersonBySocialNumberService $numberService;
    private FindPersonByAgeService $ageService;
    private FindPersonByAddressService $addressService;

    public function __construct(
        Environment $environment,
        FindPersonByNameService $nameService,
        FindPersonBySocialNumberService $numberService,
        FindPersonByAgeService $ageService,
        FindPersonByAddressService $addressService)
    {
        $this->environment = $environment;
        $this->nameService = $nameService;
        $this->numberService = $numberService;
        $this->ageService = $ageService;
        $this->addressService = $addressService;
    }

    public function getResults()
    {
        if (!empty($_POST['query_name'])) {
            $results = $this->nameService->execute();
        } elseif (!empty($_POST['query_socnumber'])) {
            $results = $this->numberService->execute();
        } elseif (!empty($_POST['query_age'])) {
            $results = $this->ageService->execute();
        } elseif (!empty($_POST['query_address'])) {
            $results = $this->addressService->execute();
        }

        echo $this->environment->render('searchResultsView.php', [
            'results' => $results
        ]);
    }

}