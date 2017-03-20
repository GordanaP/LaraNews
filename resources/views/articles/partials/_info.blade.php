<!-- Info -->
<p class="info">
    News by
    <a href="{{ route('articles.by.user', str_slug($article->user->name)) }}">
        {{ $article->user->name }}
    </a>

    Posted
    <a href="#">
        {{ $article->created_at->diffForHumans() }}
    </a>

    Category
    <a href="{{ route('articles.by.category', str_slug($article->category->name)) }}">
        {{ $article->category->name }}
    </a>
</p>
