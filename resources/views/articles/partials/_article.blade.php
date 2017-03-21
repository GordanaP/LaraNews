<article class="media">

    <!-- Image -->
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="..." alt="...">
        </a>
    </div>

    <div class="media-body">

        <!-- Title -->
        <h4 class="media-heading">
            <a href="{{ $article->path() }}">
                {{ $article->title }}
            </a>
        </h4>

        <!-- Body -->
        <p class="body">{{ $article->body }}</p>

        <!-- Info -->
        @include('articles.partials._info')

    </div>

</article>