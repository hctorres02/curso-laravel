@props([
    'thead' => null,
    'searchParams' => collect(),
])

<table class="striped">
    @if ($thead)
        <thead>
            {{ $thead }}
        </thead>
    @endif
    <tbody>
        {{ $slot }}
    </tbody>
</table>