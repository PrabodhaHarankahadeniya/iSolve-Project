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
        $employees = \DB::table('employees')
            ->where(['validity' => '1'])
            ->get();
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
        $employee->validity = 1;

        $employee->save();

        return redirect()->route('linkAddEmployee');


    }

    public function getEditEmployee(Request $request)
    {
        $detail = array();
        array_push($detail, $request['name'], $request['teleNo'], $request['nicNo'], $request['gender'], $request['address'], $request['post'], $request['id']);


        $employees = \DB::table('employees')
            ->where(['validity' => '1'])
            ->get();
        return view('employeeManagement.EditEmployee', compact('detail', 'employees'));
    }

    public function postEditSaveEmployee(Request $request)
    {

        \DB::table('employees')
            ->where(['id' => $request['id']])
            ->update(['name' => $request['name']], ['nicNo' => $request['nicNo']], ['teleNo' => $request['telNo']], ['nicNo' => $request['nicNo']], ['gender' => $request['gender']], ['address' => $request['address']], ['post' => $request['post']]);

        return redirect()->route('linkAddEmployee');


    }

    public function postDeleteEmployee(Request $request)
    {

        \DB::table('employees')
            ->where(['id' => $request['id']])
            ->update(['validity' => 0]);

        return redirect()->route('linkAddEmployee');

    }

    //Employee search
    public function getSearchEmployeeView()
    {
        $employees = \DB::table('employees')->get();

        return view('employeeManagement.SearchEmployee', compact('employees'));
    }


    public function postSearchEmployee(Request $request)
    {

        if (!empty($request['name'])) {
            $employees = \DB::table('employees')
                ->where(['name' => $request['name']])
                ->get();
        } else {
            $employees = \DB::table('employees')->get();
        }

        return view('employeeManagement.SearchResults', compact('employees'));
    }


//Attendance Related
    public
    function postMarkingAttendance()
        
    {
        $employeeList = \DB::table('employees')->
        where('validity', 1)->get();
        return view('employeeManagement.MarkingAttendance', compact('employeeList'));


    }

    public
    function postAttendance(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',

        ]);
        $employeeList = \DB::table('employees')->
        where('validity', 1)->get();
        $i = 0;
        $date = $request['date'];
        foreach ($employeeList as $employee) {

            $seviceType = 0;
            if ($request['half' . $i] === 'on') {
                $seviceType = 1;
            } elseif ($request['full' . $i] === 'on') {
                $seviceType = 2;
            }

            $ot = $request['hours' . $i];
            \DB::table('employee_attendance')->insert([

                'created_at' => date("Y-m-d h:i:sa"),
                'updated_at' => date("Y-m-d h:i:sa"),
                'emp_id' => $employee->id,
                'date' => $date,

                'service_type' => $seviceType,
                'ot_hours' => $ot

            ]);
            $i++;

        }
        return view('employeeManagement.SuccessfullMarkingAttendance', compact('employeeList'));

    }


//Employee Salary
    public
    function getCalcSalary()
    {

        $salaries = \DB::table('employee_attendance')
            ->join('employees', 'employees.id', '=', 'employee_attendance.emp_id')
            ->join('category', 'category.gender', '=', 'employees.gender')
            ->select('employees.id', 'employees.name', 'employees.gender',
                \DB::raw('sum(employee_attendance.service_type)/2 as service_type'),
                \DB::raw('category.day_salary'),
                \DB::raw('( sum(employee_attendance.service_type)/2 )* category.day_salary as cal_day_salary'),
                \DB::raw('sum(employee_attendance.ot_hours) as ot_hours'),
                \DB::raw('category.ot_hourly_salary'),
                \DB::raw('sum(employee_attendance.ot_hours)*category.ot_hourly_salary as cal_ot_hours'), 'category.epf_percentage as epf_percentage', 'category.etf_percentage as etf_percentage')
            ->groupBy('employees.id')
            ->groupBy('employees.name')
            ->groupBy('employees.gender')
            ->get();

        $salaries = $this->calculateSalaries($salaries);
        $grand_totals = $this->calculateGrandTotals($salaries);

        return view('employeeManagement.calculateSalary', compact('salaries', 'grand_totals'));

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public
    function postCalculateSalary(Request $request)
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
            ->select('employees.id', 'employees.name', 'employees.gender',
                \DB::raw('sum(employee_attendance.service_type)/2 as service_type'),
                \DB::raw('category.day_salary'), \DB::raw('( sum(employee_attendance.service_type)/2 )* category.day_salary as cal_day_salary'),
                \DB::raw('sum(employee_attendance.ot_hours) as ot_hours'),
                \DB::raw('category.ot_hourly_salary'),
                \DB::raw('sum(employee_attendance.ot_hours)*category.ot_hourly_salary as cal_ot_hours'), 'category.epf_percentage as epf_percentage', 'category.etf_percentage as etf_percentage')
            ->groupBy('employees.id')
            ->groupBy('employees.name')
            ->groupBy('employees.gender')
            ->get();

        $salaries = $this->calculateSalaries($salaries);
        $grand_totals = $this->calculateGrandTotals($salaries);

        return view('employeeManagement.calculateSalary', compact('salaries', 'grand_totals'));
    }

//Helper Functions
    public
    function calculateSalaries($salaries)
    {
        foreach ($salaries as $salary) {

            $gross_salary = $salary->cal_day_salary + $salary->cal_ot_hours;
            $salary->gross_salary = $gross_salary;
            $salary->epf = $gross_salary * $salary->epf_percentage / 100;
            $salary->etf = $gross_salary * $salary->etf_percentage / 100;
            $salary->net_salary = $gross_salary - $salary->epf;

        }


        return $salaries;
    }

    public
    function calculateGrandTotals($salaries)
    {
        $grand_totals = array();

        $grand_totals['days'] = 0;
        $grand_totals['wage'] = 0;
        $grand_totals['ot_hours'] = 0;
        $grand_totals['ot'] = 0;
        $grand_totals['gross_salary'] = 0;
        $grand_totals['epf'] = 0;
        $grand_totals['etf'] = 0;
        $grand_totals['net_salary'] = 0;


        foreach ($salaries as $salary) {

            $grand_totals['days'] = $grand_totals['days'] + $salary->service_type;
            $grand_totals['wage'] = $grand_totals['wage'] + $salary->cal_day_salary;
            $grand_totals['ot_hours'] = $grand_totals['ot_hours'] + $salary->ot_hours;
            $grand_totals['ot'] = $grand_totals['ot'] + $salary->cal_ot_hours;
            $grand_totals['gross_salary'] = $grand_totals['gross_salary'] + $salary->gross_salary;
            $grand_totals['epf'] = $grand_totals['epf'] + $salary->epf;
            $grand_totals['etf'] = $grand_totals['etf'] + $salary->etf;
            $grand_totals['net_salary'] = $grand_totals['net_salary'] + $salary->net_salary;

        }
        return $grand_totals;

    }


}