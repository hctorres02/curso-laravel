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

@php($current = resolveCurrentValue($name, $model, old($name, $current)))

@if ($label)
    <label>
        <strong>
            {{ $label }}
            @if ($attributes->has('required'))
                <span style="color: var(--pico-del-color)">*</span>
            @endif
        </strong>
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
@else
    <select {{ $attributes->merge([
        'name' => $name,
    ]) }}>
        @if ($placeholder !== false)
            <option value="">{{ $placeholder ?: $label }}</option>
        @endif
        @foreach ($options as $value => $option)
            <option value="{{ $value }}" @selected($value == $current)>{{ $option }}</option>
        @endforeach
    </select>
@endif