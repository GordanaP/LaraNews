@extends('layouts.app')

@section('title', '| ' .$user->name)

@section('messages')
    @include('errors._list')
    @include('flash::message')
@stop

@section('content')

    <!-- Page title -->
    <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        Edit User
    </h1>

    <hr>

    <!-- Update user -->
    <div class="panel panel-default panel__form">
        <div class="panel-body">

            <form action="{{ $user->path('update') }}" method="POST" enctype="multipart/form-data">

                {{ method_field('PUT') }}

                @include('admin.users.forms._formCreate', [
                    'button' => 'Edit user',
                ])

            </form>

        </div>
    </div>

@stop