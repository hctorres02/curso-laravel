@props([
    'method' => 'get',
    'model' => null,
])

<form {{ $attributes->merge([
    'method' => in_array($method, ['get', 'post']) ? $method : 'post',
]) }}>
    @if ($method != 'get')
        @csrf
        @if ($method != 'post')
            @method($method)
        @endif
    @endif
    {{ $slot }}
</form>