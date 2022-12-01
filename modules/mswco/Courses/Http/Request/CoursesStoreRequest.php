<?php

namespace mswco\Courses\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CoursesStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
        'title' => ['required','min:3','max:199'],
        'slug' => ['required','min:3','max:199','unique:courses,slug'],
        'priority' => ['nullable','numeric'],
        'price' => ['required','numeric','min:3','max:1000000'],
        'percent' => ['required','numeric','min:3','max:100'],
        'teacher_id' => ['required','exists:users,id'],
        'type' => ['required'],
        'status' => ['required'],
        'category_id' => ['required'],
        'attachment' => ['image'],
        'body' => ['required']
        ];
    }

    public function authorize(): bool
    {
        return auth()->check() == true;
    }
}
