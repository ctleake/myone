@extends('permissions.master')
@section('content')
<div class="container">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>
                        All Permissions
                    </h3>
                    &nbsp;
                </div>
                &nbsp;
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="bg-info">
                                <td>Permission Label</td>
                                <td>Permission Name</td>
                                <td>Expand Permission</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $permission->label }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td><a class="btn btn-large btn-info" href="{{ URL::to('permissions/more/' . $permission->id) }}">
                                            View more info</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        &nbsp;
                    </div>
                    &nbsp;
                </div>
            </div>
            &nbsp;
        </div>
        &nbsp;
    </div>
    &nbsp;
</div>
@endsection
