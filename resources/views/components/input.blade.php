<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        class="form-control @error($name) is-invalid @enderror"
        {{ $attributes }}
    >
    @error($name)
    @if (is_array($message))
        <div class="invalid-feedback">
            <ul class="mb-0">
                @foreach ($message as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="invalid-feedback">{{ $message }}</div>
    @endif
    @enderror
</div>
