@extends('layouts.master')

@section('messages')
    @include('flash::message')
@stop

@section('content')

    <h1>All Users</h1>

    <table class="table admin__table">

        <thead>
            <th>#</th>
            <th class="text-center">
                <i class="fa fa-cog"></i>
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Update Role</th>
            <th>Created</th>
        </thead>

        <tbody>
            @include('admin.users.partials._tableRow')
        </tbody>

    </table>

@endsection
