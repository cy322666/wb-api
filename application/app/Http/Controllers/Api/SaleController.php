<?php

namespace App\Http\Controllers\Api;

use App\Filters\SaleFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SalesCollection;

class SaleController extends Controller
{
    public function list(SaleRequest $request) : SalesCollection
    {
        return new SalesCollection(SaleFilter::searchByRequest($request)
            ->paginate($request->limit ?? 500));
    }
}
