<?php

namespace App\Filters;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class IncomeFilter implements FilterInterface
{
    public static function searchByRequest (FormRequest $request): Builder
    {
        return Order::query()
            ->whereBetween('date', [
                $request->dateFrom,
                $request->dateTo,
            ]);
    }
}