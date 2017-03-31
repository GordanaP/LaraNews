<form action="{{ $article->path('status') }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="flex">

        <!-- Status -->
        <select name="status" id="status" class="form-control" style="height: 30px; margin-right: 8px; padding: 3px 12px 5px">
            <option value="0" {{ selected(0, $article->status) }}>Draft</option>
            <option value="1">Publish</option>
            <option disabled {{ selected(1, $article->status) }}>Published</option>
        </select>

        <!-- Button -->
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fa fa-refresh" aria-hidden="true"></i>
        </button>

    </div>

</form>