<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockManagementcontroller extends controller
{
    public function postPaddyStock(){
        //return view('StockManagement.PaddyStock');
        return redirect()->route('StockManagement/PaddyStock');

    }
    public function postRiceStock(){
        return redirect()->route('StockManagement/RiceStock');

    }
    public function postFlourStock(){
        return redirect()->route('StockManagement/FlourStock');

    }
    public function postTodayRecords(){
        return redirect()->route('StockManagement/TodayRecords');

    }
    public function postStockExchange(){
        return redirect()->route('StockManagement/StockExchange');

    }
    public function getRiceStock(){
        return view('StockManagement.RiceStock');
    }
    public function getPaddyStock(){
        return view('StockManagement.PaddyStock');
    }
    public function getFlourStock(){
        return view('StockManagement.FlourStock');
    }
    public function getTodayRecords(){
        return view('StockManagement.TodayRecords');
        }
    public function getStockExchange(){
        return view('StockManagement.StockExchange');
    }
}