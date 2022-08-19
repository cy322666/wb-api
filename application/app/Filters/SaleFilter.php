<?php

namespace App\Filters;

use App\Models\Sale;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class SaleFilter implements FilterInterface
{
    public static function searchByRequest (FormRequest $request): Builder
    {
        return Sale::query()
            ->whereBetween('date', [
                $request->dateFrom,
                Carbon::today()->format('Y-m-d'),
            ])
            ->where('flag', $request->flag);
    }
}