@props([
    'asList' => false,
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
    </nav>
@endif