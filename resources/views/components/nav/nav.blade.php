@props([
    'asList' => false,
    'right' => null,
])

@if ($asList)
    <aside {{ $attributes }}>
        <nav>
            <ul>
                {{ $slot }}
            </ul>
        </nav>
    </aside>
@else
    <nav {{ $attributes }}>
        <ul>
            {{ $slot }}
        </ul>
        @if ($right)
            <ul>
                {{ $right }}
            </ul>
        @endif
    </nav>
@endif