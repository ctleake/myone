@extends('roles.master')

@section('content')

    <div class="well">

        {!! Form::open(['url' => 'roles/store_permissions/'.$role->id, 'class' => 'form-horizontal']) !!}

        {{ Form::hidden('role_id', $role->id) }}

        <fieldset>

            <legend>Select Role Permissions</legend>

            <!-- Name -->
            <legend><h4>Name: {!! $role->name !!}</h4></legend>

            <!-- Select Multiple -->
            <div class="form-group">
                {!! Form::label('permisisons', 'Permissions',
                  ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col-lg-10">
                    {!! Form::select(
                      'role_permissions[]', $permissions, $role_permissions,
                      ['class' => 'form-control', 'multiple' => true])
                    !!}
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                </div>
            </div>

        </fieldset>

        {!! Form::close()  !!}

    </div>

@endsection
