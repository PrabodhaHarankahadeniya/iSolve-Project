<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChequeManagementcontroller extends controller
{

   

    public function getReturnedRecievableCheques(){
        $temp=\DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payable_status==0) {
                if ($cheque->returned_status == 1) {
                    if ($cheque->settled_status == 0) {
                        array_push($cheques,$cheque);


                    }
                }
            }
        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    public function getSettledRecievableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payable_status==0) {
                if ($cheque->settled_status == 1) {
                    array_push($cheques,$cheque);
                }
            }
        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.SettledCheque',compact('cheques'));
    }

    public function getNonSettledRecievableCheques()
    {
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach ($temp as $cheque){
            if($cheque->payable_status==0){
                if ($cheque->settled_status == 0){
                    array_push($cheques,$cheque);

                }
            }
        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.NonSettledCheque',compact('cheques'));
    }

    public function getReturnedPayableCheques(){

        $temp=\DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payable_status==1) {
                if ($cheque->returned_status == 1) {
                    if ($cheque->settled_status == 0) {
                        array_push($cheques,$cheque);

                    }
                }
            }
        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.ReturnedCheque',compact('cheques'));
    }

    public function getSettledPayableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payable_status==1) {
                if ($cheque->settled_status == 1) {
                    array_push($cheques,$cheque);
                }
            }
        }
        $cheques=$this->sortCheques($cheques);
        return view('financialManagement.SettledCheque',compact('cheques'));
    }

    public function getNonSettledPayableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach ($temp as $cheque){
            if($cheque->payable_status==1){
                if ($cheque->settled_status == 0){
                    if ($cheque->returned_status == 0){
                        array_push($cheques,$cheque);

                    }
                }
            }
        }

        $cheques=$this->sortCheques($cheques);

        return view('financialManagement.NonSettledCheque',compact('cheques'));
    }


    public function getEditCheque(){
        return view('financialManagement.NonSettledCheque');


    }

    public function postEditCheque(Request $request){
        $chequeNo=$request['chequeNo'];

        $cheques=\DB::table('cheques')->get();
//
        foreach ($cheques as $cheque) {
//
            if ($cheque->cheque_no==$chequeNo) {
           //     echo $cheque->cheque_no;

                \DB::table('cheques')
                    ->where('id', $cheque->id)
                    ->update(['settled_status' => 1]);
                return redirect()->route('FinancialManagement');
            }
        }

    }

    public function sortCheques($cheques){
        $size=sizeof($cheques);

        for($i=0;$i<$size-1;$i++) {
            $date1 = strtotime($cheques[$i]->due_date);
            $date2 = strtotime($cheques[$i + 1]->due_date);
            if ($date1 > $date2) {
                echo 'efgf';
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

    public function selectCheques(){
        $newList=\DB::table('cheques')->get();
        return $newList;
    }
}