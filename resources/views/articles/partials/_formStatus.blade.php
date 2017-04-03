<form action="{{ $article->path('status') }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

<div class="flex">
    <!-- Status -->
    <div class="form-group" style="margin-bottom: 0;">
        <select name="status" id="status" class="form-control" style="font-size: 11px">
            <option value="0" {{ selected(0, $article->status) }}>Draft</option>
            <option value="1">Publish</option>
            <option disabled {{ selected(1, $article->status) }}>Published</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info btn-sm">
        <i class="fa fa-refresh" aria-hidden="true"></i>
    </button>
</div>
</form>