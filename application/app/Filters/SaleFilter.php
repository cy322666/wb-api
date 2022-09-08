<?php

namespace App\Filters;

use App\Models\Sale;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Builder;

class SaleFilter implements FilterInterface
{
    public static function searchByRequest (FormRequest $request): Builder
    {
        return Sale::query()
            ->whereBetween('date', [
                $request->dateFrom,
                $request->dateTo,
            ]);
    }
}