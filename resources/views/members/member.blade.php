@extends('members.master')
@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Detailed Member Information</h3>
                &nbsp;
            </div>
            &nbsp;
            <div class="panel-body">
                <h3>Member Id : {{ $member->id }}</h3>
                &nbsp;
                <h3>Member Name : {{ $member->name }}</h3>
                &nbsp;
                <h3>Email : {{ $member->email }}</h3>
                &nbsp;
                <h3>Phone : {{ $member->phone }}</h3>
                &nbsp;
                <h3>Country : {{ $member->country }}</h3>
                &nbsp;
                <h3>Joined at : {{ $member->created_at }}</h3>
                &nbsp;
                <h3>Updated at : {{ $member->updated_at }}</h3>
            </div>
        </div>
        {{--
        <a class="btn btn-small btn-success" href="{{ url('/home') }}">Back to home page</a>
        --}}
        <a class="btn btn-small btn-success" href="{{ url('/members') }}">Back to home page</a>
    </div>
@endsection

