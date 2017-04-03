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

                <!-- Action buttons -->
                @include('articles.partials._actionButtons')

                <!-- Status info -->
                @can('update', $article)
                    @include('articles.partials._statusInfo')
                @endcan

            </div>

            <!-- Update status -->
            @can('update_status', $article)
                <a href="#">Update status</a>
            @endcan

        </div>

    </article>

@stop