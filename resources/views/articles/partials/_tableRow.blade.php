@php $count = 1 @endphp

@foreach ($articles as $article)

    <tr>
        <!-- # -->
        <td>{{ $count ++ }}</td>

        <!-- Action buttons -->
        <td class="text-center">
            <div class="flex action__buttons">
                @include('articles.partials._actionButtons')
            </div>
        </td>

        <!-- Title -->
        <td>
            <a href="{{ $article->category_path('show') }}">
                {{ $article->title }}
            </a>
        </td>

        <!-- Body -->
        <td>{{ $article->body }}</td>

        <!-- Author -->
        @can('update_status', $article)
            <td>{{ fullname($article->user->profile->first_name, $article->user->profile->last_name) }}</td>
        @endcan

        <!-- Status -->
        <td class="text-center">
            @include('articles.partials._status')
        </td>

        <td>
            @include('articles.partials._formStatus')
        </td>

        <!-- Publishing Date -->
        <td class="text-center">
            @if ($article->isApproved())
                {{$article->published_at->format('d M Y')}}
            @endif
        </td>
    </tr>

@endforeach