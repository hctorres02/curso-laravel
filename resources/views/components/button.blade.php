@props([
    'label' => null,
    'icon' => null,
])

<button {{ $attributes->merge(['type' => 'button']) }}>
    @if ($slot->isEmpty())
        @if ($icon)
            <i class="fas fa-{{ $icon }}"></i>
        @endif
        @if ($label)
            <span>{{ $label }}</span>
        @endif
    @else
        {{ $slot }}
    @endif
</button>