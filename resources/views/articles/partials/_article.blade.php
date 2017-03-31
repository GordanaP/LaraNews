<article class="media">

    <!-- Image -->
    <div class="media-left">
        @include('partials._file', [
            'name' => 'article',
            'width' => '150px'
        ])
    </div>

    <div class="media-body">

        <!-- Title -->
        <h4 class="media-heading">
            <a href="{{ $article->category_path('show') }}">
                {{ $article->title }}
            </a>
        </h4>

        <!-- Info -->
        @include('articles.partials._info')

        <!-- Body -->
        <p class="body">{{ $article->body }}</p>

    </div>

</article>