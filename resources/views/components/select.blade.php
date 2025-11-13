@aware([
    'model' => null,
])

@props([
    'name',
    'label' => '',
    'placeholder' => '',
    'current' => '',
    'options' => [],
])

@php($current = resolveCurrentValue($model?->$name, $current))

<div>
    <label>
        <strong>{{ $label }}</strong>
        <select {{ $attributes->merge([
            'name' => $name,
        ]) }}>
            @if ($placeholder !== false)
                <option value="">{{ $placeholder ?: $label }}</option>
            @endif
            @foreach ($options as $value => $option)
                <option value="{{ $value }}" @selected(in_array($value, Arr::wrap($current), true))>{{ $option }}</option>
            @endforeach
        </select>
    </label>
</div>