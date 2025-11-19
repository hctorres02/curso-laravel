<div class="grid">
    <x-input label="Title" name="title" required />
    <x-input label="Slug" name="slug" />
</div>
<x-textarea label="Body" name="body" x-data="{ md }" required>
    <x-slot name="markdownToolbar">
        <x-button icon="bold" @click="md('**{text}**')" />
        <x-button icon="italic" @click="md('_{text}')" />
        <x-button icon="heading" @click="md('# {text}')" />
        <span class="separator"></span>
        <x-button icon="link" @click="md('[{text}](http://)')" />
        <x-button icon="image" @click="md('![{text}](http://)')" />
    </x-slot>
</x-textarea>
<x-textarea label="Headline" name="headline" rows="4" />
<div class="grid">
    <x-select label="Category" name="category_id" :options="$categories" required />
    <x-select label="Status" name="status" :options="$statuses" required />
</div>