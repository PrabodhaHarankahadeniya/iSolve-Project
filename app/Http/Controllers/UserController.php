<?php
namespace App\Http\Controllers;

use App\Customer;
use App\Supplier;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class Usercontroller extends controller{

    public function getDashboard(){
        return view('Dashboard');

    }

    public function postSignUp(Request $request){

        $this->validate($request,[
            'usertype'=>'required',
            'username'=>'required||unique:users|max:50',
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
        return view('employeeManagement.EmployeeManagement');
    }

    public function getOrder(){
        return view('orderManagement.orderManagement');
    }


    public function getStock(){
        return view('stockManagement.StockManagement');
    }

    public function getCustomer(){
        $customers=\DB::table('customers')->get();
        return view('stakeHolders.Customer',compact('customers'));
    }

    public function getSupplier(){
        $suppliers=\DB::table('suppliers')->get();
        return view('stakeHolders.Supplier',compact('suppliers'));
    }

    public function addCustomers(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'nameOfShop'=>'required',
            'teleNo'=>'required'
        ]);

        $name=$request['name'];
        $nameOfShop=$request['nameOfShop'];
        $teleNo=$request['teleNo'];
        $customer=new Customer($name, $teleNo);
        $customer->Name=$name;
        $customer->NameOfShop=$nameOfShop;
        $customer->TeleNo=$teleNo;
        $customer->save();
        return redirect()->route('Customer');

    }


    public function addSupplier(Request $request){
        $this->validate($request,[
            'name'=>'required',

            'teleNo'=>'required'
        ]);
        $name=$request['name'];
        $teleNo=$request['teleNo'];
        
        $supplier=new Supplier();
        $supplier->Name=$name;
        $supplier->TeleNo=$teleNo;
       

        $supplier->save();
        
        return redirect()->route('Supplier');
    }

    public function getFinancial(){
        return view('financialManagement.FinancialManagement');
    }

    public function getStakeHolders(){
        return view('stakeHolders.StakeHolders');
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