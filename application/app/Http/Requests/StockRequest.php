<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class StockRequest extends FormRequest
{
//    public array $messages = [
//        'required' => ':attribute and :other must match.',
//        'size' => 'The :attribute must be exactly :size.',
//        'between' => 'The :attribute value :input is not between :min - :max.',
//        'in' => 'The :attribute must be one of the following types: :values',
//    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dateFrom' => 'required|date_format:Y-m-d H:i:s|after:yesterday|before:tomorrow',
            'limit'    => 'numeric|min:1|max:500',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(new Response($validator->errors(), 400, [
            'Content-Type' => 'applications/json'
        ]));
    }
}
