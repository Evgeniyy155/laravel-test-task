@extends('layouts.app')

@section('title', __('Перегляд жанру'))

@section('content')
    <h1>{{ __('Жанр') }}: {{ $genre->title }}</h1>
    <div>
        <p><strong>{{ __('ID') }}:</strong> {{ $genre->id }}</p>
        <p><strong>{{ __('Назва') }}:</strong> {{ $genre->title }}</p>
    </div>
    <div class="mt-3">
        <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning">{{ __('Редагувати') }}</a>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">{{ __('Назад до списку') }}</a>
    </div>
@endsection

