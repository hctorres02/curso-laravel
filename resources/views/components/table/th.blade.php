@aware([
    'searchParams' => collect(),
])

@props([
    'label',
    'orderBy' => null,
])

<th {{ $attributes }}>
    @if ($orderBy)
        <a href="{{ route(Route::currentRouteName(), $searchParams->merge([
            'orderBy' => $orderBy,
            'sort' => when($searchParams->get('orderBy') == $orderBy, 'desc'),
        ])->filter()->all()) }}">{{ $label }}</a>
    @else
        {{ $label }}
    @endif
</th>