<div class="form-group {{ $class ?? '' }}">
    <label for="{{ $id }}">{{ $labelTitle }} {{ $attributes->has('required') ? '*' : '' }}</label>
    <textarea class="form-control" name="{{ $name }}" id="{{ $id }}" cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? '5'}}">{{ old($name) }}</textarea>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>