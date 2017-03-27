@extends('layouts.app')

@section('title', '| Article')

@section('messages')
    @include('errors._list')
    @include('flash::message')
@stop

@section('content')

    <article class="media">

        <!-- Image -->
        <div>
            @include('partials._file', [
                'name' => 'article',
                'width' => '100%'
            ])
        </div>

        <div class="media-body">

            <!-- Title -->
            <h1>{{ $article->title }}</h1>

            <!-- Body -->
            <p class="body">{{ $article->body }}</p>

            <!-- Info -->
            @include('articles.partials._info')

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
                        <form action="{{ $article->path('destroy') }}" method="POST">

                            @include('articles.partials._formDelete')

                        </form>
                    </span>
                @endcan

            </div>

            <!-- Update status -->
            @can('update_status', $article)
                <div >
                    <form action="{{ $article->path('status') }}" method="POST">

                        @include('articles.partials._formStatus')

                    </form>
                </div>
            @endcan

        </div>

    </article>

@stop