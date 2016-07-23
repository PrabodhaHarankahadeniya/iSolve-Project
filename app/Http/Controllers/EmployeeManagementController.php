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

    //adding employee
    public function postAddEditEmployee(Request $request)
    {
//        $this->validate($request, [
//            'telNo' => 'numbers'
//        ]);

        $employee = new Employee();

        $name = $request['name'];
        $telNo = $request['telNo'];
        $nicNo = $request['nicNo'];
        if($request['gender']==="Male")
            $gender =0;
        else
            $gender=1;
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

//        $this->validate($request, [
//            'telNo' => 'digits:10'
//        ]);
        if($request['gender']==="Male")
            $gender=0;
        else
            $gender=1;

        \DB::table('employees')
            ->where(['id' => $request['id']])
            ->update(['name' => $request['name'], 'nicNo' => $request['nicNo'], 'teleNo' => $request['telNo'], 'nicNo' => $request['nicNo'], 'gender' => $gender, 'address' => $request['address'], 'post' => $request['post']]);
        $employees = \DB::table('employees')
            ->where(['validity' => '1'])
            ->get();
        return view('employeeManagement.AddEmployee', compact('employees'));
//        return redirect()->route('linkAddEmployee');


    }

    public function getDeleteEmployee()
    {
        $employees = \DB::table('employees')
            ->where('validity', 1)
            ->get();

        return view('employeeManagement.DeleteEmployee', compact('employees'));

    }

    public function postDeleteEmployee(Request $request)
    {

        \DB::table('employees')
            ->where(['id' => $request['id']])
            ->update(['validity' => 0]);
        $employees = \DB::table('employees')
            ->where('validity', 1)
            ->get();

        return view('employeeManagement.DeleteEmployee', compact('employees'));

    }

    //Employee search
    public function getSearchEmployeeView()
    {
        $employees = \DB::table('employees')->get();
        $employees = $this->transfer($employees);
        return view('employeeManagement.SearchEmployee', compact('employees'));
    }


    public function postSearchEmployee(Request $request)
    {

        if (!empty($request['name'])) {
            $employees = \DB::table('employees')
                ->where(['name' => $request['name']])
                ->get();
            $employees = $this->transfer($employees);
        } else {

            $employees = \DB::table('employees')->get();
            $employees = $this->transfer($employees);
        }

        return view('employeeManagement.SearchResults', compact('employees'));
    }

    public function transfer($employees)
    {
        foreach ($employees as $temp) {
            if ($temp->validity == 1) {
                $temp->status = 'ACTIVE';
            } else {
                $temp->status = 'INACTIVE';
            }
        }
        return $employees;
    }

//Attendance Related
    public function postMarkingAttendance()

    {
        
        $employeeList = \DB::table('employees')->
        where('validity', 1)->get();
        $error=null;
        return view('employeeManagement.MarkingAttendance', compact('employeeList','error'));


    }

    public function postviewAttendance(Request $request){
        if($request['from']==null or $request['to']==null){
            $attendance=null;
            $error="date should be required";
            $date=null;
            return view('employeeManagement.ViewAttendance',compact('attendance','error','date'));
            
            
        }
        
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
    
        ]);
        $fromDate=$request['from'];
        $toDate=$request['to'];
        $date=array();
        array_push($date,$fromDate,$toDate);
        $attendance= \DB::table('employee_attendance')
            ->join('employees', 'employees.id', '=', 'employee_attendance.emp_id')
            ->where('employee_attendance.date', '>=', $fromDate)
            ->where('employee_attendance.date', '<=', $toDate)
            ->select('employees.id', 'employees.name', 'employees.gender',
                \DB::raw('( sum(employee_attendance.service_type)/2 ) as service_type'),
                \DB::raw('sum(employee_attendance.ot_hours) as ot_hours'))
            ->groupBy('employees.id')
            ->groupBy('employees.name')
            ->groupBy('employees.gender')
            ->get();
        $error=null;
        return view('employeeManagement.ViewAttendance',compact('attendance','error','date'));
    }

    public function postAttendance(Request $request)
    {
        $employeeList = \DB::table('employees')->
        where('validity', 1)->get();
        if ($request['date'] == null) {
            $error = "date field should required";

            return view('employeeManagement.MarkingAttendance', compact('employeeList', 'error'));

        }



        $i = 0;
        $date = $request['date'];
        foreach ($employeeList as $employee) {

            $seviceType = 0;
            if ($request['half' . $i] === 'on') {
                $seviceType = 1;
            } elseif ($request['full' . $i] === 'on') {
                $seviceType = 2;
            }
            if($request['hours' . $i]<0){
                $error="Ot hours should be non negative value";

                return view('employeeManagement.MarkingAttendance', compact('employeeList', 'error'));

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




    public function viewAttendance(){
        $attendance = null;
        $error=null;
        $date=null;
        return view('employeeManagement.ViewAttendance',compact('attendance','error','date'));

    }

//Employee Salary
    public function getCalcSalary()
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

   public function postCalculateSalary(Request $request)
    {

        $fromDate = $request['fromDate'];
        $toDate = $request['toDate'];

 //getting fields from databases and prosessing them
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

//Calculate the total salary for each employee
    public function calculateSalaries($salaries)
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

 //Calculate the total salary of the employees
    public function calculateGrandTotals($salaries)
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