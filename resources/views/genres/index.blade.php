@extends('layouts.app')

@section('title', __('Жанри'))

@section('content')
    <h1>{{ __('Жанри') }}</h1>
    <x-alert />
    <a href="{{ route('genres.create') }}" class="btn btn-success mb-3">{{ __('Додати жанр') }}</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Назва') }}</th>
                <th colspan="3">{{ __('Дії') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->title }}</td>
                    <td>
                        <a href="{{ route('genres.show', $genre) }}" class="btn btn-primary btn-sm">{{ __('Оглянути') }}</a>
                    </td>
                    <td>
                        <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning btn-sm">{{ __('Редагувати') }}</a>
                    </td>
                    <td>
                        <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display: inline-block; margin-left: 5px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Видалити') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
