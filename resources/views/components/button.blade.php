@props(['label' => null])

@php($label = value(function ($label) {
    if (Str::startsWith($label, 'i:')) {
        return sprintf('<i class="%s"></i>', Str::after($label, 'i:'));
    }

    return $label;
}, $label))

<button {{ $attributes->merge(['type' => 'button']) }}>
    @if ($slot->isEmpty())
        {!! $label !!}
    @else
        {{ $slot }}
    @endif
</button>