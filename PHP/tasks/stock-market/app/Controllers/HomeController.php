<?php

namespace App\Controllers;

use App\Models\Stock;
use App\Repositories\StockPortfolioRepository;
use App\Services\AddFundsToBudgetService;
use App\Services\BuyStockService;
use App\Services\GetBudgetService;
use App\Services\GetLatestPurchaseService;
use App\Services\GetPortfolioService;
use App\Services\GetPurchaseHistoryService;
use App\Services\GetSellingHistoryService;
use App\Services\GetSymbolService;
use App\Services\RemoveFundsFromBudgetService;
use App\Services\SellStockService;
use App\Services\Validators\BuyValidator;
use App\Services\Validators\SellValidator;
use Finnhub\Api\DefaultApi;
use Twig\Environment;

class HomeController
{
    private Environment $environment;
    private GetBudgetService $getBudgetService;
    private RemoveFundsFromBudgetService $removeFundsFromBudgetService;
    private AddFundsToBudgetService $addFundsToBudgetService;
    private GetPortfolioService $getPortfolioService;
    private GetPurchaseHistoryService $getPurchaseHistoryService;
    private GetSellingHistoryService $getSellingHistoryService;
    private BuyStockService $buyStockService;
    private SellStockService $sellStockService;
    private GetSymbolService $getSymbolService;
    private GetLatestPurchaseService $getLatestPurchaseService;
    private DefaultApi $client;

    public function __construct(
        Environment $environment,
        GetBudgetService $getBudgetService,
        RemoveFundsFromBudgetService $removeFundsFromBudgetService,
        AddFundsToBudgetService $addFundsToBudgetService,
        GetPortfolioService $getPortfolioService,
        GetPurchaseHistoryService $getPurchaseHistoryService,
        GetSellingHistoryService $getSellingHistoryService,
        BuyStockService $buyStockService,
        SellStockService $sellStockService,
        GetSymbolService $getSymbolService,
        GetLatestPurchaseService $getLatestPurchaseService,
        DefaultApi $client
    )
    {
        $this->environment = $environment;
        $this->getBudgetService = $getBudgetService;
        $this->removeFundsFromBudgetService = $removeFundsFromBudgetService;
        $this->addFundsToBudgetService = $addFundsToBudgetService;
        $this->getPortfolioService = $getPortfolioService;
        $this->getPurchaseHistoryService = $getPurchaseHistoryService;
        $this->getSellingHistoryService = $getSellingHistoryService;
        $this->buyStockService = $buyStockService;
        $this->sellStockService = $sellStockService;
        $this->getSymbolService = $getSymbolService;
        $this->getLatestPurchaseService = $getLatestPurchaseService;
        $this->client = $client;
    }

    public function index()
    {
        $budget = $this->getBudgetService->execute();
        $portfolio = $this->getPortfolioService->execute();
        $purchaseHistory = $this->getPurchaseHistoryService->execute();
        $sellingHistory = $this->getSellingHistoryService->execute();

        $currentStockPrices = [];
        foreach ($portfolio as $stock => ['id' => $id]) {
            $currentStockPrices[$id] = $this->client->quote($this->getSymbolService->execute($id))['c'] * 10000;
        }

        $latestPurchases = [];
        foreach ($portfolio as $stock => ['symbol' => $symbol]) {
            $latestPurchases[$symbol] = $this->getLatestPurchaseService->execute($symbol);
        }

        echo $this->environment->render('indexView.php', [
            'budget' => $budget,
            'portfolio' => $portfolio,
            'purchaseHistory' => $purchaseHistory,
            'sellingHistory' => $sellingHistory,
            'currentStockPrices' => $currentStockPrices,
            'latestPurchases' => $latestPurchases,
            'buyErrors' => $_SESSION['errors']['buyErrors'],
            'sellErrors' => $_SESSION['errors']['sellErrors']
        ]);
    }

    public function buy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $validation = new BuyValidator($_POST, $this->client);
            $_SESSION['errors']['buyErrors'] = $validation->validateForm();

            if (empty($_SESSION['errors']['buyErrors'])) {

                $currentStockPrice = $this->client->quote(strtoupper($_POST['symbol']))['c'] * 10000;
                $stock = new Stock($_POST['symbol'], $_POST['buyAmount'], $currentStockPrice);

                $this->buyStockService->execute($stock);
                $this->removeFundsFromBudgetService->execute($currentStockPrice * $_POST['buyAmount']);
            }
        }
        header('Location: /');
    }

    public function sell()
    {
        foreach ($_POST['sell'] as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sell'][$key])) {

                $validation = new SellValidator($_POST);
                $_SESSION['errors']['sellErrors'] = $validation->validateForm();

                if (empty($_SESSION['errors']['sellErrors'])) {

                    $currentStockPrice = $this->client->quote($this->getSymbolService->execute($key))['c'] * 10000;
                    $this->sellStockService->execute($key, $currentStockPrice, $_POST['sellAmount']);
                    $this->addFundsToBudgetService->execute($currentStockPrice * $_POST['sellAmount']);
                }
            }
        }
        header('Location: /');
    }
}