<?php

namespace mswco\Courses\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
    'title' => 'required|min:3|max:190',
    'slug'  => 'nullable|min:3|max:190',
    'number' => 'nullable|numeric',
    'time' => 'required|numeric|min:0|max:255',
    'season_id' => 'required',
    'free' => 'required|boolean',
    'lesson_file' => 'required',
    'body' => 'nullable'
        ];
    }

    public function authorize(): bool
    {
return auth()->check() == true;
    }
}
