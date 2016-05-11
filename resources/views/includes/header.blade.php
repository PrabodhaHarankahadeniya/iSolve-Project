<header><nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('employeeManagement')}}">Employee Management</a></li>
                    <li><a href="{{route('orderManagement')}}">Order Management</a></li>
                    <li><a href="{{route('stockManagement')}}">Stock Management</a></li>
                    <li><a href="{{route('financialManagement')}}">Financial Management</a></li>

                </ul>
            </div>
            <div class="navbar-header navbar-right">
                <ul class="nav navbar-nav">
                    @if ('admin' === $request['userName'])
                        <li>logged in as Administrator</li>
                    @endif
                    <li><a href="#">Change Password</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>

                </ul>
            </div>
        </div>


    </nav></header>