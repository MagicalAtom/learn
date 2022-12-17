<?php

namespace mswco\Courses\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SeasonsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'number' => 'nullable|numeric'
        ];
    }

    public function authorize(): bool
    {
        return auth()->check() == true;
    }
}
