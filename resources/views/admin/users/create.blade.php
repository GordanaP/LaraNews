@extends('layouts.app')

@section('title', '| Create User')

@section('messages')
    @include('errors._list')
    @include('flash::message')
@stop

@section('content')

    <!-- Page title -->
    <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        Create User
    </h1>

    <hr>

    <!-- Update user -->
    <div class="panel panel-default panel__form">
        <div class="panel-body">

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">

                @include('admin.users.forms._formCreate', [
                    'button' => 'Create user',
                ])

            </form>

        </div>
    </div>

@stop