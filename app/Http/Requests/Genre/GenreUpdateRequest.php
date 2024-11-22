<?php

namespace App\Http\Requests\Genre;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class GenreUpdateRequest extends GenreStoreRequest
{
    protected function getUniqueRule(): Unique
    {
        return Rule::unique('genres', 'title')->ignore($this->route('genre'));
    }
}
