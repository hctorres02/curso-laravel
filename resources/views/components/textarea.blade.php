@aware([
    'model' => null,
])

@props([
    'name',
    'label' => null,
    'value' => null,
    'markdownToolbar' => null,
])

@php($value = resolveCurrentValue($name, $model, old($name, $value)))

<div x-data="{{ $attributes->get('x-data', '{}') }}">
    <label for="{{ $name }}">
        <strong>
            {{ $label }}
            @if ($attributes->has('required'))
                <span style="color: var(--pico-del-color)" title="Required">*</span>
            @endif
        </strong>
    </label>
    @if ($markdownToolbar)
        <div x-ref="toolbar" class="markdown-toolbar">
            {{ $markdownToolbar }}
        </div>
    @endif
    <textarea {{ $attributes->except(['x-data'])->merge([
        'rows' => 10,
        'name' => $name,
        'placeholder' => $label,
        'x-ref' => 'textarea',
    ]) }}>{{ $value }}</textarea>
</div>

@once
    @pushIf($markdownToolbar, 'head')
        <style>
            .markdown-toolbar {
                .separator {
                    display: inline-block;
                    width: var(--pico-form-element-spacing-vertical);
                }

                a,
                button,
                [role="button"],
                [type="button"] {
                    --pico-background-color: var(--pico-muted);
                    --pico-color: var(--pico-secondary);
                    --pico-form-element-spacing-vertical: 0.3rem;
                    --pico-border-color: var(--pico-form-element-border-color);
                    --pico-primary-border: var(--pico-form-element-border-color);

                    &:hover,
                    &:focus {
                        --pico-background-color: var(--pico-secondary);
                        --pico-color: var(--pico-primary-inverse);
                    }
                }
            }
        </style>
    @endPushIf
    @pushIf($markdownToolbar, 'body-end')
        <script>
            function md(tag, text = null) {
                const textarea = this.$refs.textarea
                const start = textarea.selectionStart
                const end = textarea.selectionEnd

                if (typeof tag === 'function') {
                    return insertText(text.map(tag).join(''))
                }

                if (text === null) {
                    text = textarea.value.substring(start, end)
                }

                insertText(tag.replace('{text}', text))

                function insertText(text) {
                    textarea.value = textarea.value.substring(0, start) + text + textarea.value.substring(end)
                    textarea.setSelectionRange(start, start + text.length)
                    textarea.focus()
                }
            }
        </script>
    @endPushIf
@endonce