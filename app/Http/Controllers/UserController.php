<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
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

    public function getStakeHolders(){
        return view('StakeHolders');
    }


    public function getChangePassword(){
        return view('changePassword');
    }

    public function postChangePassword(Request $request){
        $this->validate($request,[
            'currentPassword'=>'required|min:4',
            'newPassword'=>'required|min:4',
            'confirmPassword'=>'required|min:4'
        ]);

        $currentPassword = $request['currentPassword'];
        $newPassword = ($request['newPassword']);
        $confirmPassword = ($request['confirmPassword']);

        if ($newPassword === $confirmPassword) {

            $users = User::all();
            foreach ($users as $user) {
                if (Auth::attempt(['password' => $currentPassword, 'username' => $user->username])) {

                    DB::table('users')
                        ->where('id', $user->id)
                        ->update(['password' => bcrypt($newPassword)]);
                    return redirect()->route('Dashboard');
                }

            }
        }
        else{

            return redirect()->back();

        }



    }

    
}