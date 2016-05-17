<?php
namespace App\Http\Controllers;

use App\RiceStock;
use App\PaddyStock;
use App\FlourStock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockManagementcontroller extends controller
{
    public function postPaddyStock(){
        return redirect()->route('PaddyStock');

    }
    public function postRiceStock(){
        return redirect()->route('RiceStock');

    }
    public function postFlourStock(){
        return redirect()->route('FlourStock');

    }
    public function postUpdateStocks(){
        return redirect()->route('UpdateStocks');

    }
    public function postStockExchange(){
        return redirect()->route('StockExchange');

    }

    public function getRiceStock(){
        RiceStock::getRiceStock();
        $rice=\DB::table('rice_stock')->get();
        return view('stockManagement.RiceStock',compact('rice'));
    }
    public function getPaddyStock(){
        PaddyStock::getPaddyStock();
        $paddy=\DB::table('paddy_stock')->get();
        return view('stockManagement.PaddyStock',compact('paddy'));
    }
    public function getFlourStock(){
        FlourStock::getFlourStock();
        $flour=\DB::table('flour_stock')->get();
        return view('stockManagement.FlourStock',compact('flour'));
    }
    public function getUpdateStocks(){
        return view('stockManagement.UpdateStocks');
        }
    public function getStockExchange(){
        return view('stockManagement.StockExchange');
    }
    public function getPaddyStocktoRiceMill(){
        $error=null;
        return view('stockManagement.PaddyStocktoRiceMill',compact('error'));

    }
    public function addPaddytoStock(){
        return view('stockManagement.AddPaddytoStock');

    }
    public function getRiceMilltoRiceStock(){
        return view('stockManagement.RiceMilltoRiceStock');

    }
    public function getRiceStocktoFlourMill(){
        $error=null;
        return view('stockManagement.RiceStocktoFlourMill',compact('error'));

    }
    public function getFlourMilltoFlourStock(){
        return view('stockManagement.FlourMilltoFlourStock');

    }
    public function getFlourfromStock(){
        $error=null;
        return view('stockManagement.GetFlourfromStock',compact('error'));

    }
}