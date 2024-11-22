<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class MovieStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'poster' => ['nullable', File::image()->min('1kb')->max('3mb')->dimensions(Rule::dimensions()->maxWidth(2500)->maxHeight(1500))],
            'genres' => ['required', 'array'],
            'genres.*' => ['int', 'exists:genres,id', 'distinct']
        ];
    }
}
