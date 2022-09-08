<?php

namespace App\Filters;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class StockFilter implements FilterInterface
{
    public static function searchByRequest (FormRequest $request): Builder
    {
        return Stock::query()->whereBetween('created_at', [
            $request->dateFrom,
            Carbon::tomorrow()->format('Y-m-d H:i:s'),
        ]);
    }
}