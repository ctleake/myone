<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CTLeake Laravel CRUD app</title>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            {{--
            <a class="navbar-brand" href="{{ url('/home') }}">Home</a>
            --}}
            <a class="navbar-brand" href="{{ url('/members') }}">Home</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                @if (Gate::check('register_member'))
                <li><a href="{{ url('/members/new') }}" class="btn btn-primary"><strong>Add new member</strong></a></li>
                @endif
                @if (Gate::check('rewrite_member'))
                <li><a href="{{ url('/members/edit') }}" class="btn btn-warning"><strong>Edit member data</strong></a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}"><i class="fa fa-btn fa-sign-out"></i>Dashboard</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @yield('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<!-- online links -->
<!--
<script
        src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
-->
<script
        src="//code.jquery.com/jquery-1.12.0.min.js">
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
      integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</body>
</html>
