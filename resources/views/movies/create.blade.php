@extends('layouts.app')

@section('title', __('Створити фільм'))

@section('content')
    <h1>{{ __('Створити фільм') }}</h1>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input name="title" label="{{ __('Назва фільму') }}" required />
        <x-input name="poster" label="{{ __('Постер фільму') }}" type="file" accept="image/*" />
        <div class="mb-3">
            <label for="genres" class="form-label">{{ __('Жанри') }}</label>
            <select name="genres[]" id="genres" class="form-select" multiple>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Створити') }}</button>
    </form>
@endsection
