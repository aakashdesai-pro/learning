<div class="form-group {{ $class ?? '' }}">
    <label for="{{ $id }}">
        {{ $labelTitle }}
        <span class="text-danger">{{ $attributes->has('required') ? '*' : '' }}</span>
    </label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        class="{{ $type == 'checkbox' ? 'form-check-input' : 'form-control' }}"
        @required($attributes->has('required'))
        @if ($type == 'checkbox') 
            @checked(old($name)) 
        @else 
            value="{{ old($name) }}"
        @endif
    >
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>