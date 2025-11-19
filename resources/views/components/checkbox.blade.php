@aware([
    'model' => null,
])

@props([
    'label',
    'name',
    'current' => null,
    'options' => null,
])

@php($current = resolveCurrentValue($name, $model, old($name, $current)))

<fieldset>
    @if (is_array($options))
        <legend>
            <strong>
                {{ $label }}
                @if ($attributes->has('required'))
                    <span style="color: var(--pico-del-color)" title="Required">*</span>
                @endif
            </strong>
        </legend>
        @foreach ($options as $value => $option)
            <label>
                <input {{ $attributes->except(['type', 'value'])->merge([
                    'type' => 'checkbox',
                    'name' => "{$name}[]",
                    'value' => $value,
                    'checked' => in_array($value, Arr::wrap($current), true),
                    'data-checked' => json_encode(in_array($value, Arr::wrap($current), true)),
                ]) }}>
                {{ $option }}
            </label>
        @endforeach
    @else
        <label>
            <input {{ $attributes->except(['type'])->merge([
                'type' => 'checkbox',
                'name' => $name,
                'checked' => $current,
                'data-checked' => json_encode((bool) $current),
            ]) }}>
            {{ $label }}
        </label>
    @endif
</fieldset>