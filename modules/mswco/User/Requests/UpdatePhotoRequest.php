<?php

namespace mswco\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'profile' => 'required|mimes:jpg,png,jpeg',
        ];
    }

    public function authorize(): bool
    {
        return auth()->check() == true;
    }
}
