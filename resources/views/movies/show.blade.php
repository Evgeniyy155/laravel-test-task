@extends('layouts.app')

@section('title', __('Перегляд фільму'))

@section('content')
    <h1>{{ __('Фільм') }}: {{ $movie->title }}</h1>
    <div class="mb-3">
        <p><strong>{{ __('ID') }}:</strong> {{ $movie->id }}</p>
        <p><strong>{{ __('Назва') }}:</strong> {{ $movie->title }}</p>
        <p><strong>{{ __('Статус') }}:</strong> {{ $movie->is_published ? __('Опубліковано') : __('Не опубліковано') }}</p>
        <p><strong>{{ __('Жанри') }}:</strong>
            {{ $movie->genres->pluck('title')->join(', ') }}
        </p>
        <div>
            <strong>{{ __('Постер') }}:</strong><br>
            <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" style="max-width: 200px;">
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning">{{ __('Редагувати') }}</a>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">{{ __('Назад до списку') }}</a>
    </div>
@endsection
