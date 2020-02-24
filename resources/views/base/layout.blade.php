<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('system.dashboard')}}">Project Activities</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarTop" aria-controls="navBarTop" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBarTop">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('activities.index')}}">{{__("Activities")}}</a>
            <a class="nav-item nav-link" href="{{route('customers.index')}}">{{__("Customers")}}</a>
            <a class="nav-item nav-link" href="{{route('system.management')}}">{{__("System Management")}}</a>
            <a class="nav-item nav-link" href="{{route('system.management.calendar')}}">{{__("Calendar")}}</a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
