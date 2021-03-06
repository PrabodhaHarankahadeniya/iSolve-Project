<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title><br>
    <h1 style="font-family: Times" align="center">SHAKUNI PVT(Ltd) </h1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="container">

    <section>
        @if(count($errors)>0)
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
<br><br>
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach

                </div>
            </div>
        @endif
    <div style="float:left; width:50%;">
        <div class="row">


            <div class="col-md-6">
                <div class="page-header">
                <h3>Login</h3>
                </div>
                <form action="{{route('signin')}}" method="post">
                    <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                               value="{{Request::old('username')}}" >
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                               value="{{Request::old('password')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>


        </div>
        <br><br>
        <div class="col-md-6">
            <h3>Sign Up</h3>
<form action="{{route('signup')}}" method="post">
     <div class="form-group">
         <label for="username">Username</label>
         <input class="form-control" type="text" name="username" id="username">
     </div>
     <div class="form-group">
         <label for="usertype">User Type</label>
         <input class="form-control" type="text" name="usertype" id="usertype">
     </div>

     <div class="form-group">
         <label for="password">Password</label>
         <input class="form-control" type="password" name="password" id="password">
     </div>
     <button type="submit" class="btn btn-primary">Sign up</button>
     <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
</div>


<br><br>
<div class="col-lg-5" data-href="https://web.facebook.com/VenThiththagalleAnandasiriHimi/" data-tabs="timeline" data-small-header="false"
data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
<blockquote cite="https://web.facebook.com/VenThiththagalleAnandasiriHimi/" class="fb-xfbml-parse-ignore">
 <a href="https://web.facebook.com/VenThiththagalleAnandasiriHimi">Facebook</a></blockquote></div>
<div class="col-lg-5" data-href="https://web.facebook.com/maharahathunwadimagaosse.org" data-tabs="timeline" data-small-header="false"
data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
<blockquote cite="https://web.facebook.com/maharahathunwadimagaosse.org" class="fb-xfbml-parse-ignore">
 <a href="https://web.facebook.com/maharahathunwadimagaosse.org">Facebook</a></blockquote></div>
<div class="col-lg-5" data-href="https://web.facebook.com/path.nirvana" data-tabs="timeline" data-small-header="false"
data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
<blockquote cite="https://web.facebook.com/path.nirvana" class="fb-xfbml-parse-ignore">
 <a href="https://web.facebook.com/path.nirvana">Facebook</a></blockquote></div>

</div>

<div style="float:right; width:50%;">
<br><br><br><br><br>
<img width="100%" src="src/img/banner-3neww.jpg"/>
<br>
</div>
</section>
</div>
</body>
</html>


