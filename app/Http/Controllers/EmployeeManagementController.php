<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeManagementcontroller extends controller
{
    public function postMarkingAttendance(){
        return redirect()->route('MarkingAttendance');

    }
    public function getMarkingAttendance(){
        return view('MarkingAttendance');


    }

    public function postAddEmployee(){
        return redirect()->route('AddEmployee');

    }
    public function getAddEmployee(){
        return view('AddEmployee');


    }


}