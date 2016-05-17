<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChequeManagementcontroller extends controller
{

    public function getReturnedRecievableCheques(){
        $cheques=\DB::table('cheques')->
            where('payable_status',0)->
            where('returned_status',1)->
            where('settled_status',0)->get();
//        $cheques=array();
//        foreach($temp as $cheque){
//            if($cheque->payable_status==0) {
//                if ($cheque->returned_status == 1) {
//                    if ($cheque->settled_status == 0) {
//                        array_push($cheques,$cheque);
//
//
//                    }
//                }
//            }
//        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    
    public function getSettledRecievableCheques(){
        $cheques = \DB::table('cheques')->
            where('payable_status',0)->
            where('settled_status',1)->get();
//            $cheques=array();
//        foreach($temp as $cheque){
//            if($cheque->payable_status==0) {
//                if ($cheque->settled_status == 1) {
//                    array_push($cheques,$cheque);
//                }
//            }
//        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.SettledCheque',compact('cheques'));
    }

    
    public function getNonSettledRecievableCheques()
    {
        $cheques = \DB::table('cheques')->
            where('payable_status',0)->
            where('settled_status',0)->get();
//        $cheques=array();
//        foreach ($temp as $cheque){
//            if($cheque->payable_status==0){
//                if ($cheque->settled_status == 0){
//                    array_push($cheques,$cheque);
//
//                }
//            }
//        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.NonSettledCheque',compact('cheques'));
    }

    
    public function getReturnedPayableCheques(){

        $cheques=\DB::table('cheques')->
            where('payable_status',1)->
            where('returned_status',1)->
            where('settled_status',0)->get();
//        $cheques=array();
//        foreach($temp as $cheque){
//            if($cheque->payable_status==1) {
//                if ($cheque->returned_status == 1) {
//                    if ($cheque->settled_status == 0) {
//                        array_push($cheques,$cheque);
//
//                    }
//                }
//            }
//        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    
    public function getSettledPayableCheques(){
        $cheques = \DB::table('cheques')->
            where('payable_status',1)->
            where('settled_status',1)->get();
//        $cheques=array();
//        foreach($temp as $cheque){
//            if($cheque->payable_status==1) {
//                if ($cheque->settled_status == 1) {
//                    array_push($cheques,$cheque);
//                }
//            }
//        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.SettledCheque',compact('cheques'));
    }

    
    public function getNonSettledPayableCheques(){
        $cheques = \DB::table('cheques')->
            where('payable_status',1)->
            where('returned_status',0)->
            where('settled_status',0)->get();
//        $cheques=array();
//        foreach ($temp as $cheque){
//            if($cheque->payable_status==1){
//                if ($cheque->settled_status == 0){
//                    if ($cheque->returned_status == 0){
//                        array_push($cheques,$cheque);
//
//                    }
//                }
//            }
//        }

        $cheques=$this->sortCheques($cheques);

        return view('financialManagement.NonSettledCheque',compact('cheques'));
    }


    public function editCheque(Request $request){
        \DB::table('cheques')
            ->where('cheque_no', $request['chequeNo'])
            ->update(['settled_status' => 1, 'settled_date'=>$request['settledDate']]);

        $cheque=\DB::table('cheques')
            ->where('cheque_no', $request['chequeNo'])->get();
        if($cheque[0]->payable_status==0){
            $cheques = \DB::table('cheques')->
            where('payable_status',0)->
            where('settled_status',1)->get();
//            $temp = \DB::table('cheques')->get();
//            $cheques=array();
//            foreach($temp as $cheque){
//                if($cheque->payable_status==0) {
//                    if ($cheque->settled_status == 1) {
//                        array_push($cheques,$cheque);
//                    }
//                }
//            }
            $cheques=$this->sortCheques($cheques);
            return view('financialManagement.SettledCheque',compact('cheques'));

        }

        else{
            $cheques = \DB::table('cheques')->
            where('payable_status',0)->
            where('settled_status',1)->get();
//            $temp = \DB::table('cheques')->get();
//            $cheques=array();
//            foreach($temp as $cheque){
//                if($cheque->payable_status==1) {
//                    if ($cheque->settled_status == 1) {
//                        array_push($cheques,$cheque);
//                    }
//                }
//            }
            $cheques=$this->sortCheques($cheques);
            return view('financialManagement.SettledCheque',compact('cheques'));
        }




    }

    public function postEditCheque(Request $request){
        $chequeNo=$request['chequeNo'];

        $cheque=\DB::table('cheques')
            ->where('cheque_no',$chequeNo)->get();
        
        return view('financialManagement.ChequeSettlement',compact('cheque'));
    }

    
    public function sortCheques($cheques){
        $size=sizeof($cheques);

        for($i=0;$i<$size-1;$i++) {
//            $date1 = strtotime($cheques[$i]->due_date);
//            $date2 = strtotime($cheques[$i + 1]->due_date);
            if ($cheques[$i]->due_date > $cheques[$i + 1]->due_date) {

                $temp = $cheques[$i];
                $cheques[$i] = $cheques[$i + 1];
                $cheques[$i + 1] = $temp;

            }
        }
//            if(intval(substr($date1,0,4))==intval(substr($date2,0,4))){
//                if(intval(substr($date1,5,-3))==intval(substr($date2,5,-3))){
//                    if(intval(substr($date1,-2))==intval(substr($date2,-2))){
//                        continue;
//                    }
//                    elseif (intval(substr($date1,-2))>intval(substr($date2,-2))){
//                        $temp=$cheques[$i];
//                        $cheques[$i]=$cheques[$i+1];
//                        $cheques[$i+1]=$temp;
//
//                    }
//                }
//                elseif (intval(substr($date1,5,-3))>intval(substr($date2,5,-3))){
//                    $temp=$cheques[$i];
//                    $cheques[$i]=$cheques[$i+1];
//                    $cheques[$i+1]=$temp;
//                }
//
//            }
//            elseif (intval(substr($date1,0,4))>intval(substr($date2,0,4))) {
//                $temp = $cheques[$i];
//                $cheques[$i] = $cheques[$i + 1];
//                $cheques[$i + 1] = $temp;
//            }
//        }
        return $cheques;
    }

}