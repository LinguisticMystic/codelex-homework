<?php

namespace App\Controllers;

use App\Controllers\Services\FindPersonByNameService;
use App\Controllers\Services\FindPersonBySocialNumberService;

class SearchResultsController
{
    public function getResults()
    {
        if (!empty($_POST['query_name'])) {
            $service = new FindPersonByNameService();
            $results = $service->execute();
        } elseif (!empty($_POST['query_socnumber'])) {
            $service = new FindPersonBySocialNumberService();
            $results = $service->execute();
        }

        require_once __DIR__ . '/../Views/searchResultsView.php';
    }

}