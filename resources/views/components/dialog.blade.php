@props([
    'title',
])

<template x-teleport="body">
    <dialog open x-show="open">
        <article @click.outside="open=false">
            <header>
                <h3>{{ $title }}</h3>
                <button rel="prev" @click="open=false" aria-label="Close"></button>
            </header>
            {{ $slot }}
        </article>
    </dialog>
</template>