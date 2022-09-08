<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class DeleteCategoryException extends Exception
{
    public function render(): Response|Application|ResponseFactory
    {
        return response(['error' => $this->message], 422);
    }
}
