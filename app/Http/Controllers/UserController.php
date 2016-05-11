<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends controller{

    public function getDashboard(){
        return view('Dashboard');

    }

    public function postSignUp(Request $request){

        $this->validate($request,[
           'usertype'=>'required|unique:users',
            'username'=>'required|max:50',
            'password'=>'required|min:4'
        ]);
        $username=$request['username'];
        $usertype=$request['usertype'];
        $password=bcrypt($request['password']);

        $user=new User();
        $user->username=$username;
        $user->password=$password;
        $user->usertype=$usertype;

        $user->save();
        Auth::login($user);
        return redirect()->route('Dashboard');
    }
    public function postSignIn(Request $request){

        $this->validate($request,[
           'username'=>'required',
            'password'=>'required'

        ]);
        if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']])){
            return redirect()->route('Dashboard');
        
        }
                else
                    return redirect()->back();
        
    }
    public function getLogout(){

        Auth::logout();

        return redirect()->route('home');
    }
    
    public function getEmployee(){
        return view('EmployeeManagement');
        
        
    }

    public function getOrder(){
        return view('OrderManagement');
    }


    public function getStock(){
        return view('StockManagement');


    }


    public function getFinancial(){
        return view('FinancialManagement');
    }

    public function getSettledCheques(){
        return view('SettledCheque');


    }

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

    public function getMarkingAttendance(){
        return view('MarkingAttendance');


    }

    public function postMarkingAttendance(){
        return redirect()->route('MarkingAttendance');

    }

}