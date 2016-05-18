<header><nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('Dashboard')}}">Home</a></li>
                    <li><a href="{{route('EmployeeManagement')}}">Employee Management</a></li>
                    <li><a href="{{route('orderManagement')}}">Order Management</a></li>
                    <li><a href="{{route('StockManagement')}}">Stock Management</a></li>
                    <li><a href="{{route('FinancialManagement')}}">Financial Management</a></li>
                    <li><a href="{{route('StakeHolders')}}">Stakeholders</a></li>
                </ul>
            </div>
            <div class="navbar-header navbar-right">
                <ul class="nav navbar-nav">
                    {{--@if ('admin' === $request['userName'])--}}
                        {{--<li>logged in as Administrator</li>--}}
                    {{--@endif--}}
                    <li><a href="{{route('changePassword')}}">Change Password</a></li>
                    <li><a href="{{route('logout')}}"><img src = "src/img/logout-icon.png"/>Logout</a></li>

                </ul>
            </div>
        </div>


    </nav></header>