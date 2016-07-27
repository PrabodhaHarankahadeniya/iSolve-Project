<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s
    }

    .sidenav a:hover, .offcanvas a:focus{
        color: #f1f1f1;
    }

    .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px !important;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
<header><nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('Dashboard')}}">Home</a></li>
                    <li><a href="{{route('EmployeeManagement')}}">Employee Management</a></li>
                    <li><a href="{{route('orderManagement')}}">Order Management</a></li>
                    <li><a href="{{route('StockManagement')}}">Stock Management</a></li>
                    {{--<li><a href="{{route('FinancialManagement')}}">Financial Management</a></li>--}}
                    <li><a href="{{route('StakeHolders')}}">Stakeholders</a></li>
                </ul>
            </div>

            <div class="navbar-header navbar-right">
                <ul class="nav navbar-nav">
                    <li> <div id="mySidenav3" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">×</a>
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
                                    <div id="slide_wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 style="color:whitesmoke">Change Password</h3>
                                                <form action="{{route('requestChangePassword')}}" method="post">
                                                    <div class="col-xs-7">
                                                        <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                                                            <label style="color:whitesmoke" for="currentPassword">Current Password</label>
                                                            <input type="password" class="form-control invalidInput" name="currentPassword" id="currentPassword" value="{{Request::old('currentPassword')}}" minlength="4" required>
                                                        </div></div>
                                                    <div class="col-xs-7">
                                                        <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                                                            <label style="color:whitesmoke" for="newPassword">New Password</label>
                                                            <input type="password" class="form-control input-sm" name="newPassword" id="newPassword" value="{{Request::old('newPassword')}}"minlength="4" required>
                                                        </div></div>
                                                    <div class="col-xs-7">
                                                        <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                                                            <label style="color:whitesmoke" for="confirmPassword">Confirm Password</label>
                                                            <input type="password" class="form-control input-sm" name="confirmPassword" id="confirmPassword" value="{{Request::old('confirmPassword')}}"minlength="4" required>
                                                        </div></div>
                                                    <div class="col-xs-7">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Change</button>
                                                            <input type="hidden" name="_token" value="{{Session::token()}}"></div></div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>

                        <a onclick="openNav3()">Change Password</a>

                        <script>
                            function openNav3() {
                                document.getElementById("mySidenav3").style.width = "330px";
                            }
                            function closeNav3() {
                                document.getElementById("mySidenav3").style.width = "0";
                            }
                        </script></li>
                    <li><a href="{{route('logout')}}"><img src = "src/img/logout-icon.png"/>Logout</a></li>

                </ul>
            </div>
        </div>
        </div>


    </nav></header>