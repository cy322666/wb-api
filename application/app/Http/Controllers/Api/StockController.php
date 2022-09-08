<?php

namespace App\Http\Controllers\Api;;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequest;
use App\Http\Resources\StocksCollection;
use App\Filters\StockFilter;

class StockController extends Controller
{
    public function list(StockRequest $request) : StocksCollection
    {
        return new StocksCollection(
            StockFilter::searchByRequest($request)
                ->paginate($request->limit ?? 500)
        );
    }
}
