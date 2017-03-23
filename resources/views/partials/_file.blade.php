@if (Storage::disk(str_plural($name))->has(filename($$name->id, $name)))

    <img class="media-object"
         src="{{ $$name->file_path() }}"
         alt="{{ $$name->title }}"
         width="{{ $width }}"
    >

@endif