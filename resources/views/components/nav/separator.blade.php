@aware([
    'asList' => false,
])

<li style="color: var(--pico-form-element-border-color)">
    @if ($asList)
        <hr>
    @else
        &bull;
    @endif
</li>