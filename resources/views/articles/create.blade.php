@extends('layouts.app')

@section('title', '| Create Article')

@section('messages')
    @include('errors._list')
    @include('flash::message')
@stop

@section('content')

    <!-- Page title -->
    <h1 class="page__title">
        <i class="fa fa-pencil" aria-hidden="true"></i> New Article
    </h1>

    <hr>

    <!-- Create article -->
    <div class="panel panel-default panel__form">
        <div class="panel-body">

            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">

                @include('articles.partials._formCreate', [
                    'article' => new \App\Article,
                    'button' => 'Create article',
                    'status' => old('status'),
                    'date' => old('date') ? old('date') : date('Y-m-d')
                ])

            </form>

        </div>
    </div>

@stop

@section('scripts')

@stop