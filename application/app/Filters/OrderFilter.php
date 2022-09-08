<?php

namespace App\Filters;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Builder;

class OrderFilter implements FilterInterface
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