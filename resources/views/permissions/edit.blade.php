@extends('permissions.master')
@section('content')
<div class="container">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> All Registered Permissions</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="bg-info">
                                <td>Permission Label</td>
                                <td>Permission Name</td>
                                <td>Update</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $permission->label }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a class="btn btn-large btn-success" href="{{ URL::to('permissions/edit/' . $permission->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-large btn-danger" href="{{ URL::to('permissions/delete/' . $permission->id) }}">Delete</a>
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

