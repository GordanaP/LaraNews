{{ csrf_field() }}

<!-- Image -->
<div class="flex justify-between">
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>

    <div>
        @include('partials._file', [
            'name' => 'article',
            'width' => '100px'
        ])
    </div>
</div>

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
        <option selected value="{{ Auth::user()->profile->category_id }}">
            {{ ucfirst(Auth::user()->profile->category->name) }}
        </option>
    </select>
</div>

@if (Auth::user()->hasRole('editor'))

    <!-- Status -->
    <div class="form-group">
        <div class="radio">
          <label>
            <input type="radio" name="status" id="status" value="0" default checked
            >
            Draft
          </label>

          <label>
            <input type="radio" name="status" id="status" value="1"
                {{ checked( 1, $status) }}
                        >
            Publish
          </label>
        </div>
    </div>

    <!-- Published at -->
    <div class="form-group">
        <label for="published_at">Publishing date</label>
        <input type="date" name="published_at" id="published_at" class="form-control" value="{{ date('Y-m-d') }}" />
    </div>

@endif

<!-- Button -->
<div class="form-group">
    <button type="submit" class="btn btn-success">
        {{ $button }}
    </button>
</div>