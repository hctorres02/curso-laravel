@aware([
    'model' => null,
])

@props([
    'name',
    'label' => '',
    'placeholder' => '',
    'value' => '',
])

@php($value = resolveCurrentValue($model?->$name, $value))

<div>
    <label>
        <strong><strong>{{ $label }}</strong></strong>
        <input {{ $attributes->merge([
            'name' => $name,
            'value' => $value,
            'placeholder' => $placeholder ?: $label,
        ]) }}>
    </label>
</div>