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
        $employeeList = \DB::table('employees')->get();
        $i = 0;
        $date = $request['date'];
        foreach ($employeeList as $employee) {

            $seviceType=0;
            if($request['half'.$i]==='on'){
                $seviceType=1;
            }
            elseif ($request['full'.$i]==='on'){
                $seviceType=2;
            }

            $ot = $request['hours'.$i];
            \DB::table('employee_attendance')->insert([

                'created_at'=>date("Y-m-d h:i:sa"),
                'updated_at'=>date("Y-m-d h:i:sa"),
                'emp_id' => $employee->id,
                'date' => $date,

                'service_type' => $seviceType,
                'ot_hours' => $ot

            ]);
        $i++;

        }
        return view('employeeManagement.SuccessfullMarkingAttendance', compact('employeeList'));

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
            ->join('category', 'category.gender', '=', 'employees.gender')
            // ->where('employee_attendance.date', '=', '2016-05-25')
            ->select('employees.id', 'employees.name', 'employees.gender', 'employee_attendance.date', 'employee_attendance.service_type', 'employee_attendance.ot_hours', 'category.day_salary', 'category.ot_hourly_salary', 'category.epf_percentage', 'category.etf_percentage')
            ->get();

        return view('employeeManagement.calculateSalary', compact('salaries'));

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postCalculateSalary(Request $request)
    {

        $this->validate($request, [
            'fromDate' => 'required',
            'toDate' => 'required'
        ]);

        $fromDate = $request['fromDate'];
        $toDate = $request['toDate'];

        $salaries = \DB::table('employee_attendance')
            ->join('employees', 'employees.id', '=', 'employee_attendance.emp_id')
            ->join('category', 'category.gender', '=', 'employees.gender')
            ->where('employee_attendance.date', '>=', $fromDate)
            ->where('employee_attendance.date', '<=', $toDate)
            ->select('employees.id', 'employees.name', 'employees.gender', 'employee_attendance.date', 'employee_attendance.service_type', 'employee_attendance.ot_hours', 'category.day_salary', 'category.ot_hourly_salary', 'category.epf_percentage', 'category.etf_percentage')
            ->get();

        $employ_holder = [];

        foreach ($salaries as $salary) {

            /**
            if (array_key_exists($salary->id, $employ_holder)) {

                $salary->service_type;
                $salary->ot_hours;

                $salary->day_salary;
                $salary->ot_hourly_salary;

                $salary->epf_percentage;
                $salary->etf_percentage;

                $day_counts = array('normal' => 1, 'ot' => ot_hours);

                $employ_holder [$salary->id] = $day_counts;
            } else {
                $temp_day_counts = $employ_holder[$salary->id];
                $temp_day_counts->normal = $temp_day_counts->normal + 1;
                $temp_day_counts->ot = $temp_day_counts->ot + $salary->ot_hours;
            }
             * **/
        }

        return view('employeeManagement.calculateSalary', compact('salaries'));


    }
}