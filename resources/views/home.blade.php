@extends('layouts.master')

@section('content')

    <h1>My articles</h1>

    <table class="table admin__table">

        <thead>
            <th>#</th>
            <th class="text-center"><i class="fa fa-cog"></i></th>
            <th>Title</th>
            <th width="300px">Headline</th>
            @if (Auth::user()->hasRole('editor'))
                <th>
                     Author
                </th>
            @endif
            <th class="text-center">Status</th>
            <th>Update Status</th>
            <th class="text-center">Publishing Date</th>
        </thead>

        <tbody>
            @include('articles.partials._tableRow')
        </tbody>

    </table>

@endsection

