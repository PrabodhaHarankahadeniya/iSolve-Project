<!DOCTYPE html>
<html>
<head>
    <title>Shakuni Rice Mills</title>
    <script type="text/javascript" src="{{URL::to('src/js/lib/jquery-2.2.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::to('src/js/lib/jquery-2.2.3.min.js')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/lib/bootstrap.min.css')}}">

    @yield('style')

</head>
<body>

@include('includes.header')
@include('includes.error-panel')

<div class="container">
    @yield('content')
</div>

</body>
</html>