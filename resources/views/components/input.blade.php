@aware([
    'model' => null,
])

@props([
    'name',
    'label' => '',
    'placeholder' => '',
    'value' => '',
])

@php($value = resolveCurrentValue($name, $model, old($name, $value)))

@if ($label)
    <label>
        <strong>
            {{ $label }}
            @if ($attributes->has('required'))
                <span style="color: var(--pico-del-color)" title="Required">*</span>
            @endif
        </strong>
        <input {{ $attributes->merge([
            'name' => $name,
            'value' => $value,
            'placeholder' => $placeholder ?: $label,
            'aria-invalid' => when($errors->has($name), 'true'),
        ]) }}>
        @error($name)
            <small>{{ $message }}</small>
        @enderror
    </label>
@else
    <input {{ $attributes->merge([
        'name' => $name,
        'value' => $value,
        'placeholder' => $placeholder ?: $label,
        'aria-invalid' => when($errors->has($name), 'true'),
    ]) }}>
@endif