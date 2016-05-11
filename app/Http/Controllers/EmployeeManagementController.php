<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeManagementcontroller extends controller
{
    public function postMarkingAttendance(){
        return redirect()->route('EmployeeManagement/MarkingAttendance');

    }
    public function getMarkingAttendance(){
        return view('EmployeeManagement/MarkingAttendance');


    }



}