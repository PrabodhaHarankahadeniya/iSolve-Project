<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{
//    public function getSettledCheques(){
//        $cheques=\DB::table('cheques')->get();
//        return view('SettledCheque',compact('cheques'));
//    }
//
//    public function postSettledCheques(){
//        return redirect()->route('SettledCheque');
//
//    }
//
//    public function getNonSettledCheques(){
//        $cheques=\DB::table('cheques')->get();
//        return view('NonSettledCheque',compact('cheques'));
//
//
//    }
//
//    public function postNonSettledCheques(){
//        return redirect()->route('NonSettledCheque');
//
//    }
//    public function getReturnedCheques(){
//        $cheques=\DB::table('cheques')->get();
//        return view('ReturnedCheque',compact('cheques'));
//
//
//    }
//
//    public function postReturnedCheques(){
//        return redirect()->route('ReturnedCheque');
//
//    }

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
                        $cheques->add($cheque);

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
                    $cheques->add($cheque);
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
                        $cheques->add($cheque);

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
                        $cheques->add($cheque);

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
                    $cheques->add($cheque);
                }
            }
        }

        return view('SettledCheque',compact('cheques'));
    }

    public function getNonSettledPayableCheques(){
        $temp = \DB::table('cheques')->get();
        $cheques=array();
        foreach ($temp as $cheque){
            if($cheque->payableStatus==0){
                if ($cheque->settledStatus == 0){
                    if ($cheque->returnStatus == 0){
                        $cheques->add($cheque);

                    }
                }
            }
        }



        return view('NonSettledCheque',compact('cheques'));
    }
}