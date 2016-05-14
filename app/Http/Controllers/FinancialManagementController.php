<?php
namespace App\Http\Controllers;

use App\User;
use App\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{

    public function getBusinessReport(){
        return view('BusinessReport');


    }

    public function postBusinessReport(){
        return redirect()->route('BusinessReport');

    }

    public function getReturnedRecievableCheques(){
        $temp=\DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payableStatus==0) {
                if ($cheque->returnStatus == 1) {
                    if ($cheque->settledStatus == 0) {
                        array_push($cheques,$cheque);


                    }
                }
            }
        }
        
        return view('ReturnedCheque',compact('cheques'));
    }

    public function getSettledRecievableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payableStatus==0) {
                if ($cheque->settledStatus == 1) {
                    array_push($cheques,$cheque);
                }
            }
        }

        return view('SettledCheque',compact('cheques'));
    }

    public function getNonSettledRecievableCheques()
    {
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach ($temp as $cheque){
            if($cheque->payableStatus==0){
                if ($cheque->settledStatus == 0){
                    array_push($cheques,$cheque);

                }
            }
        }

        return view('NonSettledCheque',compact('cheques'));
    }

    public function getReturnedPayableCheques(){

        $temp=\DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payableStatus==1) {
                if ($cheque->returnStatus == 1) {
                    if ($cheque->settledStatus == 0) {
                        array_push($cheques,$cheque);

                    }
                }
            }
        }

        return view('ReturnedCheque',compact('cheques'));
    }

    public function getSettledPayableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach($temp as $cheque){
            if($cheque->payableStatus==1) {
                if ($cheque->settledStatus == 1) {
                    array_push($cheques,$cheque);
                }
            }
        }

        return view('SettledCheque',compact('cheques'));
    }

    public function getNonSettledPayableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach ($temp as $cheque){
            if($cheque->payableStatus==1){
                if ($cheque->settledStatus == 0){
                    if ($cheque->returnStatus == 0){
                        array_push($cheques,$cheque);

                    }
                }
            }
        }



        return view('NonSettledCheque',compact('cheques'));
    }


    public function getEditCheque(){
        return view('NonSettledCheque');


    }

    public function postEditCheque(Request $request){
        $chequeNo=$request['chequeNo'];

        $cheques=\DB::table('cheques')->get();

        foreach ($cheques as $cheque) {

            if (Auth::attempt(['chequeNo' => $chequeNo])) {

                \DB::table('cheques')
                    ->where('id', $cheque->id)
                    ->update(['settledStatus' => 1]);
                return redirect()->route('editCheque');
            }


        }


    }




}