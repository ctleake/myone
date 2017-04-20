@extends('roles.master')

@section('content')

    <div class="well">

        {!! Form::open(['url' => 'roles/store_roles/'.$user->id, 'class' => 'form-horizontal']) !!}

        {{ Form::hidden('user_id', $user->id) }}

        <fieldset>

            <legend>Select User's Roles</legend>

            <!-- Name -->
            <legend><h4>Name: {!! $user->name !!}</h4></legend>

            <!-- Email -->
            <legend><h4>Email: {!! $user->email !!}</h4></legend>

            <!-- Select Multiple -->
            <div class="form-group">
                {!! Form::label('roles', 'Roles',
                  ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col-lg-10">
                    {!! Form::select(
                      'user_roles[]', $roles, $user_roles,
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
