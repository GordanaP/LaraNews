@extends('layouts.app')

@section('title', '| Edit Article')

@section('messages')
    @include('errors._list')
    @include('flash::message')
@stop

@section('content')

    <!-- Page title -->
    <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        Edit Article
    </h1>

    <hr>

    <!-- Update article -->
    <div class="panel panel-default panel__form">
        <div class="panel-body">

            <form action="{{ $article->path('update') }}" method="POST" enctype="multipart/form-data">

                {{ method_field('PUT') }}

                @include('articles.partials._formCreate', [
                    'button' => 'Save changes',
                    'status' => $article->status
                ])

            </form>

        </div>
    </div>

@stop