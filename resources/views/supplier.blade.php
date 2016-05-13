@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

            <br>
            <h1 align="center">Suppliers </h1>
            <br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th align="center">Name</th>

                    <th align="center">TeleNo</th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $temp)

                    <div>
                        <tr>
                            <td>{{$temp->Name}}</td>

                            <td>{{$temp->TeleNo}}</td>
                        </tr>

                    </div>
                @endforeach
                </tbody>
            </table>

    </section>
    <section>
        <form class="form-horizontal" role="form">
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
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>



    </section>

@endsection