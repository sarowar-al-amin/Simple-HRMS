<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateSalaryReviewRequest extends FormRequest
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
            'end' => ['required', 'date'],
        ];
    }
}
