<?php
namespace App\Http\Controllers;

use App\Customer;
use App\Supplier;
use App\User;
use App\PaddyStock;
use App\RiceStock;
use App\FlourStock;
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
        return view('stakeholders.Customer',compact('customers'));
    }

    public function getSupplier(){
        $suppliers=\DB::table('suppliers')->get();
        return view('stakeholders.Supplier',compact('suppliers'));
    }

    public function addCustomers(Request $request){
        $this->validate($request,[
            'Telephone_No'=>'digits:10',

        ]);
        $name=$request['name'];
        $nameOfShop=$request['nameOfShop'];
        $teleNo=$request['Telephone_No'];
        $customer=new Customer();
        $customer->name=$name;
        $customer->name_of_shop=$nameOfShop;
        $customer->tele_no=$teleNo;
        $customer->save();
        return redirect()->route('Customer');

    }


    public function addSupplier(Request $request){
        $this->validate($request,[
            'Telephone_No'=>'digits:10',

        ]);
        $name=$request['name'];
        $teleNo=$request['Telephone_No'];
        
        $supplier=new Supplier();
        $supplier->name=$name;
        $supplier->tele_no=$teleNo;
       

        $supplier->save();
        
        return redirect()->route('Supplier');
    }

    public function getFinancial(){
        return view('financialManagement.FinancialManagement');
    }

    public function getStakeHolders(){
        return view('stakeholders.StakeHolders');
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