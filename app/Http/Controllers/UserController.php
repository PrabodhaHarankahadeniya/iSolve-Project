<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends controller{

    public function getDashboard(){
        return view('dashboard');

    }

//    public function postSignUp(Request $request){
//
//        $this->validate($request,[
//           'usertype'=>'required|unique:users',
//            'username'=>'required|max:50',
//            'password'=>'required|min:4'
//        ]);
//        $username=$request['username'];
//        $usertype=$request['usertype'];
//        $password=bcrypt($request['password']);
//
//        $user=new User();
//        $user->username=$username;
//        $user->password=$password;
//        $user->usertype=$usertype;
//
//        $user->save();
//        Auth::login($user);
//        return redirect()->route('dashboard');
//    }
    public function postSignIn(Request $request){

        $this->validate($request,[
           'username'=>'required',
            'password'=>'required'

        ]);
        if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']])){
            return redirect()->route('dashboard');
        
        }
                else
                    return redirect()->back();
        
    }
    public function getLogout(){

        Auth::logout();

        return redirect()->route('home');
    }
    
    public function getEmployee(){
        return view('employeeManagement');
        
        
    }

    public function postEmployee(){
        return redirect()->route('employeeManagement');

    }
    
    public function getOrder(){
        return view('orderManagement');


    }

    public function postOrder(){
        return redirect()->route('orderManagement');

    }
    public function getStock(){
        return view('stockManagement');


    }

    public function postStock(){
        return redirect()->route('stockManagement');

    }

    public function getFinancial(){
    return view('financialManagement');


}

    public function postFinancial(){
        return redirect()->route('financialManagement');

    }
}