@extends('layouts.app')

@section('title', '| Home')

@section('messages')
    @include('flash::message')
@stop

@section('content')

    <h1>Latest News</h1>

    <hr>

    <!-- Articles list -->
    @foreach ($articles as $article)

        @include('articles.partials._article')

    @endforeach

    <!-- Pagination -->
    <div class="text-center">
        {{ $articles->links() }}
    </div>

@stop
