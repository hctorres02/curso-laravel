@props([
    'search' => null,
    'searchParams' => collect(),
])

<table class="striped">
    @if ($search)
        <thead>
            {{ $search }}
        </thead>
    @endif
    <tbody>
        {{ $slot }}
    </tbody>
</table>