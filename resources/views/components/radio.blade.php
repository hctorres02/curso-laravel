@aware([
    'model' => null,
])

@props([
    'label',
    'name',
    'options' => [],
    'current' => null,
])

@php($current = resolveCurrentValue($name, $model, old($name, $current)))

<fieldset>
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
            <input {{ $attributes->except(['type'])->merge([
                'type' => 'radio',
                'name' => $name,
                'value' => $value,
            ]) }} @checked((string) $value === (string) $current)>
            {{ $option }}
        </label>
    @endforeach
</fieldset>