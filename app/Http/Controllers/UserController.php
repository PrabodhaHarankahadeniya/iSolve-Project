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
        $done=null;
        return view('Dashboard',compact('done'));

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
        $user->user_type=$usertype;

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
//
            \DB::table('users')->where('user_type',"currentUser")->update(['username'=>$request['username']]);
            
            return redirect()->route('Dashboard');
        }
        else
                    return redirect()->back();
        
    }

    public function postChangePassword(Request $request){

        $currentPassword = $request['currentPassword'];
        $newPassword = ($request['newPassword']);
        $confirmPassword = ($request['confirmPassword']);
        $flag=0;
        if ($newPassword === $confirmPassword) {

            $users = User::all();
            $currentUserName=\DB::table('users')->where('user_type',"currentUser")->value('username');
            foreach ($users as $user) {
                if ((Auth::attempt(['password' => $currentPassword, 'username'=> $user->username]))) {

                    DB::table('users')
                        ->where('id', $user->id) 
                        ->update(['password' => bcrypt($newPassword)]);
                    $done='done';
                    return view('dashboard',compact('done'));
                }

            }
            if($flag==0){
                $wrong="Current Password is incorrect...!!!";
                return view('changePassword',compact('wrong'));
            }
        }
        else{
            $wrong="New Password and confirmed passwords don't match...!!!";
            return view('changePassword',compact('wrong'));

        }



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
        $customers=\DB::table('customers')->where('in',1)->get();
        return view('stakeholders.Customer',compact('customers'));
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
        $customer->in=1;

        $customer->save();
        return redirect()->route('Customer');
        //return view('stakeholders.Customer',compact('customers'));

    }
    public function removeCustomer(){
        $customers=\DB::table('customers')->where('in',1)->get();
        return view('stakeholders.customerDelete',compact('customers'));

    }

    public function postRemoveCustomer(Request $request){
        \DB::table('customers')
            ->where(['id' => $request['id']])
            ->update(['in' => 0]);
     
        return redirect()->route('Customer');

    }

    public function postEditCustomer(Request $request){
        $customer=\DB::table('customers')->where('id',$request['id'])->get();
        $customers=\DB::table('customers')->where('in',1)->get();
        
        return view('stakeholders.customerEdit',compact('customers','customer'));
        
    }

    public function postSaveCustomer(Request $request){
        \DB::table('customers')->where('id',$request['id'])
            ->update(['name' => $request['name'],
                'name_of_shop' => $request['nameOfShop'],
                'tele_no' => $request['Telephone_No']]);

        return redirect()->route('Customer');
    }

    public function getSupplier(){
        $suppliers=\DB::table('suppliers')->where('in',1)->get();
        return view('stakeholders.Supplier',compact('suppliers'));
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
        $supplier->in=1;

        $supplier->save();
        return redirect()->route('Supplier');
       
    }

    public function removeSupplier(){
        $suppliers=\DB::table('suppliers')->where('in',1)->get();
        return view('stakeholders.supplierDelete',compact('suppliers'));

    }

    public function postRemoveSupplier(Request $request){
        \DB::table('suppliers')
            ->where(['id' => $request['id']])
            ->update(['in' => 0]);

        return redirect()->route('Supplier');

    }

    public function postEditSupplier(Request $request){
        $supplier=\DB::table('suppliers')->where('id',$request['id'])->get();
        $suppliers=\DB::table('suppliers')->where('in',1)->get();

        return view('stakeholders.supplierEdit',compact('suppliers','supplier'));
    }

    public function postSaveSupplier(Request $request){
        \DB::table('suppliers')->where('id',$request['id'])
            ->update(['name' => $request['name'],'tele_no' => $request['Telephone_No']]);
            

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

    
    
}