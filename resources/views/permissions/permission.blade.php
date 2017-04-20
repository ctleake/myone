@extends('permissions.master')
@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Detailed Permission Information</h3>
                &nbsp;
            </div>
            &nbsp;
            <div class="panel-body">
                <h3>Permission Label : {{ $permission->label }}</h3>
                &nbsp;
                <h3>Permission Name : {{ $permission->name }}</h3>
                &nbsp;
                <h3>Created on : {{ $permission->created_at }}</h3>
                &nbsp;
                <h3>Updated on : {{ $permission->updated_at }}</h3>
            </div>
        </div>
        {{--
        <a class="btn btn-small btn-success" href="{{ url('/home') }}">Back to home page</a>
        --}}
        <a class="btn btn-small btn-success" href="{{ url('/permissions') }}">Back to home page</a>
    </div>
@endsection

