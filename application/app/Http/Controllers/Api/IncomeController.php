<?php

namespace App\Http\Controllers\Api;

use App\Filters\IncomeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeRequest;
use App\Http\Resources\IncomesCollection;

class IncomeController extends Controller
{
    public function list(IncomeRequest $request) : IncomesCollection
    {
        return new IncomesCollection(
            IncomeFilter::searchByRequest($request)
                ->paginate($request->limit ?? 500));
    }
}
