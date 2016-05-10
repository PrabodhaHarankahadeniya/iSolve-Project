@extends('Layouts.master')
@section('title')
welcome!
@endsection

@section('content')
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

@endsection