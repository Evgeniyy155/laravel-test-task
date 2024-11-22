@extends('layouts.app')

@section('title', __('Редагувати жанр'))

@section('content')
    <h1>{{ __('Редагувати жанр') }}</h1>
    <form action="{{ route('genres.update', $genre) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input name="title" label="{{ __('Назва жанру') }}" value="{{ $genre->title }}" required />

        <button type="submit" class="btn btn-primary">{{ __('Оновити') }}</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">{{ __('Назад до списку') }}</a>
    </form>
@endsection
