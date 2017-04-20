@extends('members.master')
@section('content')
<div class="container">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Edit member data</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('members/save-updates',$member->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                <div>Name of the new member:</div>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name='name' value="{{$member->name}}"/></br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                <div>Emali address:</div>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="{{$member->email}}"></br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                <div>Contact Number:</div>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone" value="{{$member->phone}}"></br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                <div>Country:</div>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="country" value="{{$member->country}}"></br>
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
</div>
@endsection