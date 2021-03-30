<?php

namespace App\Controllers;

use App\Services\FindPersonByNameService;
use App\Services\FindPersonBySocialNumberService;

class SearchResultsController
{
    private FindPersonByNameService $nameService;
    private FindPersonBySocialNumberService $numberService;

    public function __construct(FindPersonByNameService $nameService, FindPersonBySocialNumberService $numberService)
    {
        $this->nameService = $nameService;
        $this->numberService = $numberService;
    }

    public function getResults()
    {
        if (!empty($_POST['query_name'])) {
            $results = $this->nameService->execute();
        } elseif (!empty($_POST['query_socnumber'])) {
            $results = $this->numberService->execute();
        }

        require_once __DIR__ . '/../Views/searchResultsView.php';
    }

}