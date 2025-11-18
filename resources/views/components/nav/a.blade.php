@props([
    'current' => false,
])

<li>
    <a {{ $attributes->merge([
        'href' => '#',
        'aria-current' => when($current, 'page'),
    ]) }}>
        @if ($current)
            <strong>{{ $slot }}</strong>
        @else
            {{ $slot }}
        @endif
    </a>
</li>