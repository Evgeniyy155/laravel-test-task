@extends('layouts.app')

@section('title',  __('Створити жанр'))

@section('content')
    <h1>{{ __('Додати жанр') }}</h1>
    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <x-input name="title" label="{{ __('Назва жанру') }}"/>
        <button type="submit" class="btn btn-primary">{{ __('Додати') }}</button>
    </form>
@endsection
