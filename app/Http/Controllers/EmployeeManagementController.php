<?php
namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeManagementcontroller extends controller
{
    // Employee master data
    public function getAddEmployee()
    {
        $employees = \DB::table('employees')->get();
        return view('employeeManagement.AddEmployee', compact('employees'));
    }

    public function postAddEditEmployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'telNo' => 'required',
            'nicNo' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'post' => 'required',
        ]);

        $employee = new Employee();

        $name = $request['name'];
        $telNo = $request['telNo'];
        $nicNo = $request['nicNo'];
        $gender = $request['gender'];
        $address = $request['address'];
        $post = $request['post'];

        $employee->name = $name;
        $employee->nicNo = $nicNo;
        $employee->gender = $gender;
        $employee->teleNo = $telNo;
        $employee->address = $address;
        $employee->post = $post;

        $employee->save();

        return redirect()->route('linkAddEmployee');


    }

    //Employee Attendance
    public function postMarkingAttendance()
    {
        return redirect()->route('MarkingAttendance');

    }

    public function getMarkingAttendance()
    {
        $employeeList = \DB::table('employees')->get();
        return view('employeeManagement.MarkingAttendance', compact('employeeList'));


    }

    public function postAttendance(Request $request)
    {
        $employees = \DB::table('employees')->get();
        $i = 0;
        $date = date("Y/m/d");
        foreach ($employees as $employee) {

            $serviceType = $request['type'];
            $ot = $request['hours'];
            \DB::table('employee_attendance')->insert([
                'emp_id' => $employee->id,
                'date' => $date,

                'service_type' => $serviceType,
                'ot_hours' => $ot

            ]);


        }

    }

    public function getAttendance()
    {


    }

    //Employee EPF and ETF
    public function getCalcEPF_ETF()

    {

    }

    //Employee Salary
    public function getCalcSalary()
    {
        $salaries = \DB::table('employee_attendance')
            ->join('employees', 'employees.id', '=', 'employee_attendance.emp_id')
            //->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('employees.name', 'employees.gender', 'employee_attendance.date', 'employee_attendance.service_type', 'employee_attendance.ot_hours')
            ->get();
        return view('employeeManagement.calculateSalary', compact('salaries'));
    }

    public function postCalculateSalary(Request $request) {

        $this->validate($request, [
            'fromDate' => 'required',
            'toDate' => 'required'
        ]);

        $fromDate = $request['fromDate'];
        $toDate = $request['toDate'];

      // $salaries = \DB::table('employee_attendance')
        //    ->get();


        $salaries = DB::table('employee_attendance')
            ->join('employees', 'employees.id', '=', 'employee_attendance.emp_id')
            //->join('orders', 'users.id', '=', 'orders.user_id')
           ->select('employees.name', 'employees.gender', 'employee_attendance.date', 'employee_attendance.service_type', 'employee_attendance.ot_hours')
            ->get();

        return redirect()->route('linkCalculateSalary', compact('salaries'));


    }
}