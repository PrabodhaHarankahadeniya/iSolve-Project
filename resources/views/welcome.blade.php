<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">

</head>
<body>

<div class="container">
    <section>
        @if(count($errors)>0)
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
            <div class="row">


                <div class="col-md-6">
                    <h3>sign up</h3>
                    <form action="{{route('signup')}}" method="post">
                        <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                            <label for="usertype">Usertype</label>
                            <input type="text" class="form-control" name="usertype" id="usertype" value="{{Request::old('username')}}">
                        </div>
                        <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{Request::old('username')}}">
                        </div>
                        <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{Request::old('password')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </form>
                </div>


            </div>
        <div class="row">


            <div class="col-md-6">
                <h3>Login</h3>
                <form action="{{route('signin')}}" method="post">
                    <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{Request::old('username')}}">
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{Request::old('password')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>


        </div>

    </section>

</div>
</body>
</html>


