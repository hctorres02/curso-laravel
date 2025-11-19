@aware([
    'searchParams' => collect(),
])

@props([
    'label',
    'orderBy' => null,
])

@php($isCurrent = $orderBy && $searchParams->get('orderBy') == $orderBy)
@php($sortDesc = $searchParams->get('sort') == 'desc')

<th {{ $attributes }}>
    @if ($orderBy)
        <a href="{{ route(Route::currentRouteName(), $searchParams->merge([
            'orderBy' => $orderBy,
            'sort' => when($isCurrent && ! $sortDesc, 'desc'),
        ])->filter(fn ($value) => $value !== '' || $value !== null)->all()) }}">
            {{ $label }}
            <i @class([
                'fas',
                'fa-sort-up' => $isCurrent && ! $sortDesc,
                'fa-sort-down' => $isCurrent && $sortDesc,
            ])></i>
        </a>
    @else
        {{ $label }}
    @endif
</th>