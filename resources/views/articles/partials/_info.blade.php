<!-- Info -->
<p class="info">
    News by
    <a href="{{ $article->related_path('user') }}">
        {{ $article->user->name }}
    </a>

    Posted
    <a href="#">
        {{ $article->created_at->diffForHumans() }}
    </a>

    Category
    <a href="{{ $article->related_path('category') }}">
        {{ $article->category->name }}
    </a>
</p>
