<div>
    <label>{{ $label }}</label>
    @foreach ($options as $option)
        <div>
            <input type="checkbox" name="{{ $name }}[]" value="{{ $option['value'] }}">
            <span>{{ $option['label'] }}</span>
        </div>
    @endforeach
</div>
