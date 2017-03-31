<form action="{{ $article->path('destroy') }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-danger btn-sm btn__trash">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>

</form>