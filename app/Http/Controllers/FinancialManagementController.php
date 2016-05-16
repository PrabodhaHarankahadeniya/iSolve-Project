<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{



    public function getBusinessReport(){
        $data=null;
        return view('financialManagement.BusinessReport',compact('data'));
        
    
    }
    public function postDate(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',

        ]);

        $purchases=$this->selectPurchace();
        $cheques=$this->selectCheques();

        return view('financialManagement.BusinessReport',compact('purchases','cheques'));
    }



    public function selectPurchace(){
        $newList=\DB::table('purchases')->get();
        return $newList;
    }

    public function selectPayableCheques($downEnd,$upEnd){
        $cheques=\DB::table('cheques')->get();
        $newList=array();
        
        foreach ($cheques as $cheque){
            if($cheque->payable_status==1){
                if(is){
                    array_push($newList,$cheque);    
                }
            }
                

        }
        return $newList;
    }

    public function selectRecievableCheques(){
        $cheques=\DB::table('cheques')->get();
        $newList=array();
        foreach ($cheques as $cheque){
            if($cheque->payable_status==0)
                array_push($newList,$cheque);
            
        }
        
        return $newList;
    }


}