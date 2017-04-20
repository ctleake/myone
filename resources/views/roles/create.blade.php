@extends('roles.master')
@section('content')
    <div class="container">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add new Role</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/roles/data') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    <div>Label of the new Role:</div>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name='label' value="{{ old('label') }}"/></br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    <div>Name of the new Role:</div>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name='name' value="{{ old('name') }}"/></br>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-success btn-block" value='Submit'>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>@endsection