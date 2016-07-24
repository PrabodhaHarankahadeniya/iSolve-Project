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

        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    
    public function getSettledRecievableCheques(){
        $cheques = \DB::table('cheques')->
            where('payable_status',0)->
            where('settled_status',1)->get();


        return view('financialManagement.SettledCheque',compact('cheques'));
    }

    
    public function getNonSettledRecievableCheques()
    {
        $cheques = \DB::table('cheques')->
            where('payable_status',0)->
            where('returned_status',0)->
            where('settled_status',0)->get();

        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.NonSettledCheque',compact('cheques'));
    }

    
    public function getReturnedPayableCheques(){

        $cheques=\DB::table('cheques')->
            where('payable_status',1)->
            where('returned_status',1)->
            where('settled_status',0)->get();

        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    
    public function getSettledPayableCheques(){
        $cheques = \DB::table('cheques')->
            where('payable_status',1)->
            where('settled_status',1)->get();


        return view('financialManagement.SettledCheque',compact('cheques'));
    }

    
    public function getNonSettledPayableCheques(){
        $cheques = \DB::table('cheques')->
            where('payable_status',1)->
            where('returned_status',0)->
            where('settled_status',0)->get();

        $cheques=$this->sortCheques($cheques);

        return view('financialManagement.NonSettledCheque',compact('cheques'));
    }


    public function editCheque(Request $request){

        $chequeNo=$request['chequeNo'];
        $payableStatus=\DB::table('cheques')
            ->where('cheque_no', $chequeNo)->value('payable_status');

        \DB::table('cheques')
            ->where('cheque_no', $chequeNo)
            ->update(['settled_status' => 1, 'settled_date'=>$request['settledDate']]);

    if($payableStatus==1){
        return redirect()->route('settledPayable');

    }
    else {

        return redirect()->route('settledRecievable');
    }

    }

    public function postEditCheque(Request $request)
    {
        $chequeNo = $request['chequeNo'];

        $cheque = \DB::table('cheques')
            ->where('cheque_no', $chequeNo)->get();
        $error = null;
        return view('financialManagement.ChequeSettlement', compact('cheque', 'error'));
    }

    public function postViewReturnRecievable(){
        
        $cheques=\DB::table('cheques')->
        where('payable_status',0)->
        where('returned_status',0)->
        where('settled_status',0)->get();

        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ChequeReturns',compact('cheques'));

    }

    public function postViewReturnPayable(){

        $cheques=\DB::table('cheques')->
        where('payable_status',1)->
        where('returned_status',0)->
        where('settled_status',0)->get();

        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ChequeReturns',compact('cheques'));

    }


    public function postEditReturn(Request $request){
        $chequeNo=$request['chequeNo'];

        \DB::table('cheques')
            ->where('cheque_no',$chequeNo)
            ->update(['returned_status'=>1]);

        $payableStatus=\DB::table('cheques')
            ->where('cheque_no', $chequeNo)->value('payable_status');

        $cheques=\DB::table('cheques')->
        where('payable_status',$payableStatus)->
        where('returned_status',1)->
        where('settled_status',0)->get();

        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    
    public function sortCheques($cheques){
        $size=sizeof($cheques);

        for($i=0;$i<$size-1;$i++) {

            $date1 = $cheques[$i]->due_date;
            $date2 = $cheques[$i + 1]->due_date;
//            $date1 = strtotime($cheques[$i]->due_date);
//            $date2 = strtotime($cheques[$i + 1]->due_date);
//            if ($cheques[$i]->due_date > $cheques[$i + 1]->due_date) {
//
//                $temp = $cheques[$i];
//                $cheques[$i] = $cheques[$i + 1];
//                $cheques[$i + 1] = $temp;
//
//            }
//        }
            if(intval(substr($date1,0,4))==intval(substr($date2,0,4))){
                if(intval(substr($date1,5,-3))==intval(substr($date2,5,-3))){
                    if(intval(substr($date1,-2))==intval(substr($date2,-2))){
                        continue;
                    }
                    elseif (intval(substr($date1,-2))>intval(substr($date2,-2))){
                        $temp=$cheques[$i];
                        $cheques[$i]=$cheques[$i+1];
                        $cheques[$i+1]=$temp;

                    }
                }
                elseif (intval(substr($date1,5,-3))>intval(substr($date2,5,-3))){
                    $temp=$cheques[$i];
                    $cheques[$i]=$cheques[$i+1];
                    $cheques[$i+1]=$temp;
                }

            }
            elseif (intval(substr($date1,0,4))>intval(substr($date2,0,4))) {
                $temp = $cheques[$i];
                $cheques[$i] = $cheques[$i + 1];
                $cheques[$i + 1] = $temp;
            }
        }
        return $cheques;
    }

}