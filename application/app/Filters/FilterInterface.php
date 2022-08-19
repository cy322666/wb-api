<?php

namespace App\Filters;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public static function searchByRequest (FormRequest $request): Builder;
}