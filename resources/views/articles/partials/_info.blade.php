<p class="info">

    <!-- Author -->
    By
    {{-- <a href="?author={{ str_slug($article->user->name) }}"> --}}
    <a href="{{ $article->related_path('user') }}">
        {{ fullname($article->user->profile->first_name, $article->user->profile->last_name) }}
    </a>

    <!-- Publishing Date -->
    <span>
        @if ($article->isApproved())
            {{ $article->published_at->format('d M Y') }}
        @else
            {{ $article->created_at->format('d M Y') }}
        @endif
    </span>
</p>
