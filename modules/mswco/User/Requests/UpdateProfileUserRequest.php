<?php

namespace mswco\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'card_number' => 'nullable',
            'user_name' => 'nullable',
            'password' => 'nullable',
            'biography' => 'nullable',
        ];
    }

    public function authorize(): bool
    {
        return auth()->check() == true;
    }
}
