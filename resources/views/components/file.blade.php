@aware([
    'model' => null,
])

@props([
    'label',
    'name',
    'preview' => false,
])

@php($current = resolveCurrentValue($name, $model))

<div x-data="{
    handleFileSelected,
    files: {{ collect($current) }}
}">
    @if ($preview)
        <template x-for="src in files">
            <article>
                <iframe :src="src" height="405" width="100%" aria-hidden="true"></iframe>
            </article>
        </template>
    @else
        <template x-for="url in files">
            <input x-model="url" aria-hidden="true" disabled>
        </template>
    @endif
    <label role="button" class="outline secondary" style="margin-bottom: var(--pico-block-spacing-vertical)">
        {{ $label }}
        @if ($attributes->has('required'))
            <span style="color: var(--pico-del-color)">*</span>
        @endif
        <input {{ $attributes->except(['type'])->merge([
            'type' => 'file',
            'name' => $name,
            'data-has-preview' => json_encode($preview),
            '@change' => 'handleFileSelected',
            'style' => 'display: none',
        ]) }}>
    </label>
</div>

@pushOnce('body-end')
    <script>
        function handleFileSelected(event) {
            const target = event.target
            const files = Array.from(target.files)
            const hasPreview = JSON.parse(target.dataset.hasPreview)

            if (hasPreview) {
                this.files = files.map(URL.createObjectURL)
                return
            }

            this.files = files.map(file => file.name)
        }
    </script>
@endPushOnce