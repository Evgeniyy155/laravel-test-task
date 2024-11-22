@extends('layouts.app')

@section('title', __('Фільми'))

@section('content')
    <h1>{{ __('Фільми') }}</h1>
    <x-alert />
    <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">{{ __('Додати фільм') }}</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Назва') }}</th>
            <th>{{ __('Статус') }}</th>
            <th>{{ __('Постер') }}</th>
            <th colspan="4">{{ __('Дії') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->is_published ? __('Опубліковано') : __('Не опубліковано') }}</td>
                <td><img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" width="50"></td>
                <td>
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary btn-sm">{{ __('Огляд') }}</a>
                </td>
                <td>
                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning btn-sm">{{ __('Редагувати') }}</a>
                </td>
                <td>
                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Видалити') }}</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('movies.publish', $movie) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-secondary btn-sm">
                            {{ $movie->is_published ? __('Скасувати публікацію') : __('Опублікувати') }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
