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
</section>


    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>what do you have to say</h3></header>
            <form action="">
                <div class="form-group">
                    <textarea class="form-control" name="new-post" id="new-post" rows="5" placeholder="your post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create post</button>
            </form>
         </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>what do other people  say</h3></header>
            <article class="post">
                <p>r  rgrgfdgf gfdg rhjhj ghyj rhyjy hthjhfv efdsg hgjgj kukjh grhgkn f g gfjgf fds</p>
                <div class="info">
                    posted by max on 12 feb 2016
                </div>
                <div class="interaction">
                    <a href="a">Like</a> |
                    <a href="aaaa">dislike</a> |
                    <a href="aaa">edit</a> |
                    <a href="aa"> delete</a>
                </div>
            </article>
            <article class="post">
                <p></p>
                <div class="info">
                    posted by max on 12 feb 2016
                </div>
                <div class="interaction">
                    <a href="a">Like</a> |
                    <a href="aaaa">dislike</a> |
                    <a href="aaa">edit</a> |
                    <a href="aa"> delete</a>
                </div>
            </article>
        </div>

    </section>
@endsection