@extends('layouts.app')

@section('title', __('Редагувати фільм'))

@section('content')
    <h1>{{ __('Редагувати фільм') }}</h1>
    <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input name="title" label="{{ __('Назва фільму') }}" value="{{ $movie->title }}" required />

        <div class="mb-3">
            <label for="poster" class="form-label">{{ __('Постер фільму') }}</label><br>
            <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" style="max-width: 200px; margin-bottom: 10px;">
            <input type="file" name="poster" id="poster" class="form-control">
        </div>

        <div class="mb-3">
            <label for="genres" class="form-label">{{ __('Жанри') }}</label>
            <select name="genres[]" id="genres" class="form-select" multiple>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genres->contains('id', $genre->id) ? 'selected' : '' }}>
                        {{ $genre->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Оновити') }}</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">{{ __('Назад до списку') }}</a>
    </form>
@endsection
