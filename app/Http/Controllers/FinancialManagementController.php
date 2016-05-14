<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{

    public function getBusinessReport(){
        return view('financialManagement.BusinessReport');


    }

    public function postBusinessReport(){
        return redirect()->route('BusinessReport');

    }

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




}