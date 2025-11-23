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
            <span class="separator"></span>
            <button @click="decodeMarkdown">
                <i class="fas fa-eye"></i>
            </button>
        </div>
        <template x-teleport="body">
            <dialog x-ref="output">
                <article @click.outside="$refs.output.removeAttribute('open')">
                    <header>
                        <strong>Preview</strong>
                        <button rel="prev" @click="$refs.output.removeAttribute('open')" aria-label="Close"></button>
                    </header>
                    <div></div>
                </article>
            </dialog>
        </template>
    @endif
    <textarea {{ $attributes->except(['x-data'])->merge([
        'rows' => 10,
        'name' => $name,
        'placeholder' => $label,
        'x-ref' => 'textarea',
        'aria-invalid' => when($errors->has($name), 'true'),
    ]) }}>{{ $value }}</textarea>
    @error($name)
        <small>{{ $message }}</small>
    @enderror
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

            async function decodeMarkdown(event) {
                event.preventDefault()

                const { textarea, output } = this.$refs
                const data = await sendRequest(this.preview, { body: textarea.value })

                output.querySelector('div').innerHTML = data
                output.setAttribute('open', true)
            }
        </script>
    @endPushIf
@endonce