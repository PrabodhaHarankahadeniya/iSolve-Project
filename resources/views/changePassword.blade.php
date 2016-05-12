<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">

</head>
<body>
@include('includes.header')
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
                <h3>Change Password</h3>
                <form action="{{route('requestChangePassword')}}" method="post">
                    {{method_field('PATCH')}}
                    <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" name="currentPassword" id="currentPassword" value="{{Request::old('currentPassword')}}">
                    </div>
                    <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword" value="{{Request::old('newPassword')}}">
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="{{Request::old('confirmPassword')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>


        </div>
     </section>
</div>
</body>
</html>