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
        return view('financialManagement.BusinessReportTime');    
    }
    

    //get request of date and search data from the databasa
    public function postDate(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',

        ]);
        $fromDate=$request['from'];
        $toDate=$request['to'];
        $details=array();
        
        $purchases=$this->selectPurchace($fromDate,$toDate);
        $payableCheques=$this->selectPayableCheques($fromDate,$toDate);
        $recievableCheques=$this->selectRecievableCheques($fromDate,$toDate);
        $orders=$this->selectOrders($fromDate,$toDate);
        $salaryAmount=null;
        
        array_push($details,$fromDate,$toDate,$purchases,$orders,$payableCheques,$recievableCheques,$salaryAmount);
        return view('financialManagement.BusinessReport',compact('details'));
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

//
//        $newList=array();
//
//        foreach ($cheques as $cheque){
//            if($cheque->payable_status==1){
//                if($cheque->settled_status==1)
//                    array_push($newList,$cheque);
//                }
//            }

        return $cheques;
    }


    public function selectRecievableCheques($downEnd,$upEnd){
        $cheques=\DB::table('cheques')
            ->where('settled_date','>=',$downEnd)
            ->where('settled_date','<=',$upEnd)
            ->where('payable_status',0)
            ->where('settled_status',1)->get();
//
//        $newList=array();
//        foreach ($cheques as $cheque){
//            if($cheque->payable_status==0){
//                if($cheque->settled_status==1)
//                    array_push($newList,$cheque);
//            }
//
//        }
        
        return $cheques;
    }

    
    public function calculateSalaries($fromDate,$toDate){
        
        
    }

}