@aware([
    'model' => null,
])

@props([
    'label',
    'name',
    'options' => [],
    'current' => null,
])

@php($current = resolveCurrentValue($model?->$name, $current))

<fieldset>
    <legend><strong>{{ $label }}</strong></legend>
    @foreach ($options as $value => $option)
        <label>
            <input {{ $attributes->except(['type'])->merge([
                'type' => 'radio',
                'name' => $name,
                'value' => $value,
            ]) }} @checked((string) $value === (string) $current)>
            {{ $option }}
        </label>
    @endforeach
</fieldset>