<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialManagementcontroller extends controller
{



    public function postSettledCheques(){
        return redirect()->route('FinancialManagement.SettledCheque');

    }

    public function getNonSettledCheques(){
        return view('FinancialManagement.NonSettledCheque');


    }

    public function postNonSettledCheques(){
        return redirect()->route('FinancialManagement.NonSettledCheque');

    }
    public function getReturnedCheques(){
        return view('FinancialManagement.ReturnedCheque');


    }

    public function postReturnedCheques(){
        return redirect()->route('FinancialManagement.ReturnedCheque');

    }
    public function getBusinessReport(){
        return view('FinancialManagement.BusinessReport');


    }

    public function postBUsinessReport(){
        return redirect()->route('FinancialManagement.BusinessReport');

    }
    public function getSettledCheques(){
        return view('FinancialManagement.SettledCheque');


    }


}