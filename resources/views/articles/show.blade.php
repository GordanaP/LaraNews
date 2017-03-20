@extends('layouts.app')

@section('title', '| Article')

@section('content')

    <article class="media">

        <!-- Image -->
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="..." alt="...">
            </a>
        </div>

        <div class="media-body">

            <!-- Title -->
            <h1>{{ $article->title }}</h1>

            <!-- Body -->
            <p class="body">{{ $article->body }}</p>

            <!-- Info -->
            @include('articles.partials._info')

        </div>


        <!-- Buttons -->
        <div class="flex article__buttons">

            <a href="{{ route('articles.edit', str_slug($article->title)) }}" class="btn btn-warning btn-sm btn__edit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>

            <form action="{{ route('articles.destroy', str_slug($article->title)) }}" method="POST">

                @include('articles.partials._formDelete')

            </form>

        </div>

    </article>

@stop