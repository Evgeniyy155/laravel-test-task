<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('main') }}">{{ __('Головна') }}</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('genres.create') }}">{{ __('Створити жанр') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movies.create') }}">{{ __('Створити фільм') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movies.index') }}">{{ __('Фільми') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('genres.index') }}">{{ __('Жанри') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
