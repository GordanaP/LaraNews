<form action="{{ $article->path('destroy') }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fa fa-trash"></i>
    </button>

</form>