@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

            <br>
            <h1>Suppliers </h1>

            <br>
            <table class="table table-bordered" style="width: 60%" align="center" >

                <thead>
                <tr>
                    <th>Name</th>

                    <th>Telephone No</th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $temp)

                    <div>
                        <tr>
                            <td width="40%">{{$temp->Name}}</td>

                            <td width="20%">{{$temp->TeleNo}}</td>
                        </tr>

                    </div>
                @endforeach
                </tbody>
            </table>
<br><br>
    </section>
    <section>
        <form class="form-horizontal" role="form">
            <h3>New Supplier form</h3><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Telephone No :</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="pwd" placeholder="Enter telephone No.">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>



    </section>
    <table style="width:100%">
        <tr>
            <th>Month</th>
            <th>Savings</th>
        </tr>
        <tr>
            <td width="10%">January</td>
            <td width="60%">$100</td>
        </tr>
        <tr>
            <td>February</td>
            <td>$80</td>
        </tr>
    </table>

@endsection