@extends('layouts.master')

@section('content')

    <h1>My articles</h1>

    <table class="table admin__table">
        <thead>
            <th>#</th>
            <th class="text-center"><i class="fa fa-cog"></i></th>
            <th>Title</th>
            <th width="300px">Headline</th>
            <th>Category</th>
            <th>Status</th>
            <th class="text-center">Publishing Date</th>
        </thead>
        <tbody>
            @php $count = 1 @endphp
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $count ++ }}</td>
                    <td>
                        <div class="flex action__buttons">
                            <a href="{{ $article->category_path('edit') }}" class="btn btn-warning btn-sm btn__edit">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            @include('articles.partials._formDelete')
                        </div>
                    </td>
                    <td>
                        <a href="{{ $article->category_path('show') }}">
                            {{ $article->title }}
                        </a>
                    </td>
                    <td>{{ $article->body }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->status() }}</td>
                    <td class="text-center">
                        {{ $article->published_at ? $article->published_at->format('d M Y') : '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
