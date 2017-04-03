@if (Auth::check() && Auth::user()->can('update_status', $article))

    <!-- Edit -->
    <span>
        <a href="{{ $article->category_path('edit') }}" class="btn btn-warning btn-sm btn__edit">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </a>
    </span>

    <!-- Delete-->
    <span>
        @include('articles.partials._formDelete')
    </span>

@else

    <!-- Edit -->
    @can('update', $article)
        <span>
            <a href="{{ $article->category_path('edit') }}" class="btn btn-warning btn-sm btn__edit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </span>
    @endcan

    <!-- Delete-->
    @can('delete', $article)
        <span>
            @include('articles.partials._formDelete')
        </span>
    @endcan

@endif