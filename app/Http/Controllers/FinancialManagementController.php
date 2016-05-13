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
        $cheques=\DB::table('cheques')->get();
        return view('ReturnedCheque',compact('cheques'));
    }

    public function getSettledRecievableCheques(){

        $cheques=\DB::table('cheques')->get();
        return view('SettledCheque',compact('cheques'));
    }
    public function getNonSettledRecievableCheques(){
        $cheques=\DB::table('cheques')->get();
        return view('NonSettledCheque',compact('cheques'));
    }
    public function getReturnedPayableCheques(){
        $cheques=\DB::table('cheques')->get();
        return view('ReturnedCheque',compact('cheques'));
    }

    public function getSettledPayableCheques(){
        $cheques=\DB::table('cheques')->get();
        return view('SettledCheque',compact('cheques'));
    }
    public function getNonSettledPayableCheques(){
        $cheques=\DB::table('cheques')->get();
        return view('NonSettledCheque',compact('cheques'));
    }
}