<div class="form-group {{ $class ?? '' }}">
    <label for="{{ $id }}">{{ $labelTitle }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control" @required($attributes->has('required'))>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>