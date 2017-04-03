<!-- Status -->
<span class="status">
    Status: <b>{{ $article->status() }}</b>
</span>

<!-- Publishing date -->
<span>
    @if ($article->isNotPublished())
        Publishing date: <b>{{ $article->published_at->format('d M Y') }}</b>
    @endif
</span>
