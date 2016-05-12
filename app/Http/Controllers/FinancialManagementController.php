<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{



    public function postSettledCheques(){
        return redirect()->route('SettledCheque');

    }

    public function getNonSettledCheques(){
        return view('NonSettledCheque');


    }

    public function postNonSettledCheques(){
        return redirect()->route('NonSettledCheque');

    }
    public function getReturnedCheques(){
        return view('ReturnedCheque');


    }

    public function postReturnedCheques(){
        return redirect()->route('ReturnedCheque');

    }
    public function getBusinessReport(){
        return view('BusinessReport');


    }

    public function postBUsinessReport(){
        return redirect()->route('BusinessReport');

    }
    public function getSettledCheques(){
        return view('SettledCheque');


    }


}