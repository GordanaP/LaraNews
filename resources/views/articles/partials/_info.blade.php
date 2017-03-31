<!-- Info -->
<p class="info">
    By
    <a href="{{ $article->related_path('user') }}">
        {{ fullname($article->user->profile->first_name, $article->user->profile->last_name) }}
    </a>

    <span>{{ $article->published_at->format('d M Y') }}</span>

</p>
