@extends('roles.master')
@section('content')
    <div class="container">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> All Roles</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr class="bg-info">
                                    <td>Label Name</td>
                                    <td>Role Name</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>{{ $role->label }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a class="btn btn-large btn-success" href="{{ URL::to('roles/edit_role/' . $role->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-large btn-danger" href="{{ URL::to('roles/delete_role/' . $role->id) }}">Delete</a>
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

