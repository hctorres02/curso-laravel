@aware([
    'model' => null,
])

@props([
    'label',
    'name',
    'current' => null,
    'options' => null,
])

@php($current = resolveCurrentValue($model?->$name, $current))

<fieldset>
    @if (is_array($options))
        <legend><strong>{{ $label }}</strong></legend>
        @foreach ($options as $value => $option)
            <label>
                <input {{ $attributes->except(['type', 'value'])->merge([
                    'type' => 'checkbox',
                    'name' => "{$name}[]",
                    'value' => $value,
                ]) }} @checked(in_array($value, Arr::wrap($current), true))>
                {{ $option }}
            </label>
        @endforeach
    @else
        <label>
            <input {{ $attributes->except(['type'])->merge([
                'type' => 'checkbox',
                'name' => $name,
            ]) }} @checked($current)>
            {{ $label }}
        </label>
    @endif
</fieldset>