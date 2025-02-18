<div class="form-group {{ $class ?? '' }}">
    <label for="{{ $id }}">{{ $labelTitle }} {{ $attributes->has('required') ? '*' : '' }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $id }}">
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" @selected(old($name) == $key || ($value ?? '') == $key)>{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>