<?php

namespace mswco\Role\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
    "name" => "required|min:3|unique:roles,name",
    "permission" => "required|array|min:1"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
