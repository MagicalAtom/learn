<?php

namespace mswco\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use mswco\User\Services\CodeGenerateService;
use mswco\User\Services\VerifyCodeServices;

class SendResetPasswordCodeRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
    return [
    'verify_code' => CodeGenerateService::Rule(),
    'email' => 'required|email',
    ];
    }
}
