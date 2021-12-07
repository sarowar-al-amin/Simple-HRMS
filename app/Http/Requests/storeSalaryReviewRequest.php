<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeSalaryReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date']
        ];
    }
}
