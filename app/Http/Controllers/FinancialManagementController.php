<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{


//function to show get time period for business report
    public function getBusinessReport(){  
        $wrong=null;
        return view('financialManagement.BusinessReportTime',compact('wrong'));    
    }


    //get request of date and search data from the databasa
    public function postDate(Request $request){
        $fromDate=$request['from'];
        $toDate=$request['to'];
        if($fromDate>$toDate){
            $wrong="Please enter a valid date range";
            return view('financialManagement.BusinessReportTime',compact('wrong'));
        }
        else {
            $details = array();

            $purchases = $this->selectPurchace($fromDate, $toDate);
            $payableCheques = $this->selectPayableCheques($fromDate, $toDate);
            $recievableCheques = $this->selectRecievableCheques($fromDate, $toDate);
            $orders = $this->selectOrders($fromDate, $toDate);
            $salaryAmount = round($this->calculateSalaries($fromDate, $toDate));
            if($purchases==null and $payableCheques==null and $recievableCheques==null and $orders==null and $salaryAmount==null ){
                $wrong="No results were recorded in given date range";
                return view('financialManagement.BusinessReportTime',compact('wrong'));
            }
            else {
                array_push($details, $fromDate, $toDate, $purchases, $orders, $payableCheques, $recievableCheques, $salaryAmount);
                return view('financialManagement.BusinessReport', compact('details'));
            }
        }
    }



    public function selectPurchace($downEnd,$upEnd){
        $purchasesList=\DB::table('purchases')
            ->where('date','>=',$downEnd)
            ->where('date','<=',$upEnd)->get();
        return $purchasesList;
    }

    public function selectOrders($downEnd,$upEnd){
        $orderList=\DB::table('orders')
            ->where('date','>=',$downEnd)
            ->where('date','<=',$upEnd)->get();
        return $orderList;
    }

    public function selectPayableCheques($downEnd,$upEnd){
        $cheques=\DB::table('cheques')
            ->where('settled_date','>=',$downEnd)
            ->where('settled_date','<=',$upEnd)
            ->where('payable_status',1)
            ->where('settled_status',1)->get();


        return $cheques;
    }


    public function selectRecievableCheques($downEnd,$upEnd){
        $cheques=\DB::table('cheques')
            ->where('settled_date','>=',$downEnd)
            ->where('settled_date','<=',$upEnd)
            ->where('payable_status',0)
            ->where('settled_status',1)->get();

        return $cheques;
    }

    
    public function calculateSalaries($fromDate,$toDate){

        $salaries = \DB::table('employee_attendance')
            ->join('employees', 'employees.id', '=', 'employee_attendance.emp_id')
            ->join('category', 'category.gender', '=', 'employees.gender')
            ->where('employee_attendance.date', '>=', $fromDate)
            ->where('employee_attendance.date', '<=', $toDate)
            ->select('employees.id', 'employees.name', 'employees.gender',
                \DB::raw('( sum(employee_attendance.service_type)/2 )* category.day_salary as cal_day_salary'),
                \DB::raw('sum(employee_attendance.ot_hours)*category.ot_hourly_salary as cal_ot_hours'), 'category.epf_percentage as epf_percentage', 'category.etf_percentage as etf_percentage')
            ->groupBy('employees.id')->get();
        $netSalary=0;
        foreach ($salaries as $salary) {

            $gross_salary = $salary -> cal_day_salary + $salary -> cal_ot_hours;
            $epfValue = $gross_salary * $salary -> epf_percentage / 100;
            $etfValue = $gross_salary * $salary -> etf_percentage / 100;
            $employeesalary = $gross_salary - $epfValue+$etfValue;
            $netSalary+=$employeesalary;

        }

        return $netSalary;
    }

}