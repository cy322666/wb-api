<?php

namespace App\Http\Controllers\Api;

use App\Filters\OrderFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrdersCollection;

class OrderController extends Controller
{
    public function list(OrderRequest $request) : OrdersCollection
    {
        return new OrdersCollection(OrderFilter::searchByRequest($request)
            ->paginate($request->limit ?? 500)
        );
    }
}
