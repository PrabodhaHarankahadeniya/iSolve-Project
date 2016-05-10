@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
<section class="row new-post">
    <div>
        <!--<a href="index.php" class="loginLink">Logout</a></div>-->
    <br>
    <div class="buttonBlock" >
        <a href="EmployeeManagement.html"><button class="button">Employee Management</button></a>
        <a href="OrderManagement.html"><button class="button">Order Management</button></a>
        <a href="StockManagement.html"><button class="button">Stock Management</button></a>
        <a href="FinanceManagement.php"><button class="button">Finance Management</button></a>
    </div>
    <br><br><br><br>
    <h1>SHAKUNI PVT(Ltd) </h1>
    <br><br><br>
    <img src="img/banner-3.jpg" style="align-items: center"/>
    </div>
</section>


@endsection