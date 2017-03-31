@extends('layouts.app')

@section('title', '| ' .$article->title)

@section('messages')
    @include('errors._list')
    @include('flash::message')
@stop

@section('content')

    <article class="media">

        <!-- Title -->
        <h1 class="title">{{ $article->title }}</h1>

        <!-- Info -->
        @include('articles.partials._info')

        <!-- Headline -->
        <p class="body">{{ $article->body }}</p>

        <!-- Image -->
        <div>
            @include('partials._file', [
                'name' => 'article',
                'width' => '100%'
            ])
        </div>

        <div class="media-body">

            <!-- Body -->
            <p class="body">{{ $article->body }}</p>

        </div>

        <div class="flex justify-between article__buttons">
            <div class="flex">

                <!-- Edit button -->
                @can('update', $article)
                    <span>
                        <a href="{{ $article->category_path('edit') }}" class="btn btn-warning btn-sm btn__edit">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </span>
                @endcan

                <!-- Delete button-->
                @can('delete', $article)
                    <span>
                        @include('articles.partials._formDelete')
                    </span>
                @endcan

                @can('update', $article)
                    <span class="status">
                        Status: <b>{{ $article->status() }}</b>
                    </span>

                    <span>
                        @if ($article->status() == "Approved")
                            Publishing date: <b>{{ $article->published_at->format('d M Y') }}</b>
                        @endif
                    </span>
                @endcan
            </div>

            <!-- Update status -->
            @can('update_status', $article)
                <div >
                    @include('articles.partials._formStatus')
                </div>
            @endcan

        </div>

    </article>

@stop