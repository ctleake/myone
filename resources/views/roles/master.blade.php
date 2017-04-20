<!doctype html>
<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    </script>
    <link rel="stylesheet"
          href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Laravel</title>
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/roles') }}">Home</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/roles/list_edit') }}" class="btn btn-primary"><strong>Edit Roles</strong></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/roles/create') }}" class="btn btn-warning"><strong>Add a Role</strong></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}"><i class="fa fa-btn fa-sign-out"></i>Dashboard</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <div class="col-lg-8"> @yield('content') </div>

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
</div>
</body>

</html>
