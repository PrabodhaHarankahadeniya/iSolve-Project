<!DOCTYPE html>
<html>
<head>
    <title>Shakuni Rice Mills</title>
<<<<<<< 928d0375919f365e8eeb68ef546b5784d97e910f
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
    @yield('style')
=======
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/homePage.css')}}">
>>>>>>> externalizing errors to a standalone panel

</head>
<body>

@include('includes.header')
@include('includes.error-panel')

<div class="container">
    @yield('content')
</div>

</body>
</html>