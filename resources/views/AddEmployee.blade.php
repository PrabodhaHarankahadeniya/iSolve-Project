@extends('Layouts.master')

@section('content')

    <section class="row new-post">

        <br>
        <h1 align="center">Employee Management</h1>
        <br>
        <table class="table table-bordered" style="width: 70%" align="center">
            <thead>
            <tr>
                <th align="center">Employee Name</th>
                <th align="center">Telephone Number</th>
                <th align="center">NIC Number</th>
                <th align="center">Gender</th>
                <th align="center">Address</th>
                <th align="center">Designation</th>
            </tr>
            </thead>
            <tbody>

            <!--code for pouplation logic -->
            </tbody>
        </table>
        <br><br>
        <h3>Employee Form</h3><br>
        <form action="{{route('linkCustomers')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Employee Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for=">telNo">Telephone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telNo" id="telNo"
                           placeholder="Enter Telephone Number">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nicNo">NIC Number</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="nicNo" id="nicNo" placeholder="Enter NIC Number">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="gender" id="gender" placeholder="Enter Gender">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Address</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="address" id="address" placeholder="Enter Address">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="designation">Designation</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="designation" id="designation"
                           placeholder="Enter Designation">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>

        </form>


    </section>
@endsection