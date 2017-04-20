@extends('members.master')
@section('content')
<div class="container">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> All Registered Members</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="bg-info">
                                <td>Member Name</td>
                                <td>Email Address</td>
                                <td>Phone Number</td>
                                <td>Update</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $key => $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>
                                        <a class="btn btn-large btn-success" href="{{ URL::to('members/edit/' . $member->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-large btn-danger" href="{{ URL::to('members/delete/' . $member->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

