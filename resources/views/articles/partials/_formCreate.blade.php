{{ csrf_field() }}

<!-- Title -->
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="{{ old('title') ?? $article->title }}" autofocus  />
</div>

<!-- Body -->
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control" rows="5" placeholder="Enter body">{{ old('body') ?? $article->body }}</textarea>
</div>

<!-- Category_id -->
<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option selected disabled>Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ selected($category->id, old('category_id') ?? $article->category_id) }}
            >
                {{ ucfirst($category->name) }}
            </option>
        @endforeach
    </select>
</div>

<!-- Button -->
<div class="form-group">
    <button type="submit" class="btn btn-success">
        {{ $button }}
    </button>
</div>