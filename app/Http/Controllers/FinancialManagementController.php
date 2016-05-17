<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{



    public function getBusinessReport(){
//        $purchases=null;
//        $orders=null;
//        $payableCheques=null;
//        $recievableCheques=null;
//        $salaryAmount=null;

//        return view('financialManagement.BusinessReport',compact('purchases','orders','payableCheques','recievableCheques','salaryAmount'));
        
        return view('financialManagement.BusinessReportTime');    
    }
    public function postDate(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',

        ]);
        $fromDate=$request['from'];
        $toDate=$request['to'];

        $purchases=$this->selectPurchace($fromDate,$toDate);
        $payableCheques=$this->selectPayableCheques($fromDate,$toDate);
        $recievableCheques=$this->selectRecievableCheques($fromDate,$toDate);
        $orders=null;
        $salaryAmount=null;
        return view('financialManagement.BusinessReport',compact('purchases','orders','payableCheques','recievableCheques','salaryAmount'));
    }



    public function selectPurchace($downEnd,$upEnd){
        $newList=\DB::table('purchases')
            ->where('purchases.date','>=',$downEnd)
            ->where('purchases.date','<=',$upEnd)->get();
        return $newList;
    }

    public function selectPayableCheques($downEnd,$upEnd){
        $cheques=\DB::table('cheques')
            ->where('cheques.settled_date','>=',$downEnd)
            ->where('cheques.settled_date','<=',$upEnd)->get();


        $newList=array();
        
        foreach ($cheques as $cheque){
            if($cheque->payable_status==1){
                if($cheque->settled_status==1)
                    array_push($newList,$cheque);
                }
            }

        return $newList;
    }


    public function selectRecievableCheques($downEnd,$upEnd){
        $cheques=\DB::table('cheques')
            ->where('cheques.settled_date','>=',$downEnd)
            ->where('cheques.seetled_date','<=',$upEnd)->get();

        $newList=array();
        foreach ($cheques as $cheque){
            if($cheque->payable_status==0){
                if($cheque->settled_status==1)
                    array_push($newList,$cheque);
            }

        }
        
        return $newList;
    }


}