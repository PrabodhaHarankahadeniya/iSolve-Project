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
        $rice=\DB::table('rice')->get();
        return view('stockManagement.RiceStock',compact('rice'));
    }
    public function getPaddyStock(){
        PaddyStock::getPaddyStock();
        $paddy=\DB::table('paddystock')->get();
        return view('stockManagement.PaddyStock',compact('paddy'));
    }
    public function getFlourStock(){
        FlourStock::getFlourStock();
        $flour=\DB::table('flourstock')->get();
        return view('stockManagement.FlourStock',compact('flour'));
    }
    public function getUpdateStocks(){
        return view('stockManagement.UpdateStocks');
        }
    public function getStockExchange(){
        return view('stockManagement.StockExchange');
    }
    public function getPaddyStocktoRiceMill(){
        return view('stockManagement.PaddyStocktoRiceMill');

    }
    public function addPaddytoStock(){
        return view('stockManagement.AddPaddytoStock');

    }
    public function getRiceMilltoRiceStock(){
        return view('stockManagement.RiceMilltoRiceStock');

    }
    public function getRiceStocktoFlourMill(){
        return view('stockManagement.RiceStocktoFlourMill');

    }
    public function getFlourMilltoFlourStock(){
        return view('stockManagement.FlourMilltoFlourStock');

    }
    public function getFlourfromStock(){
        return view('stockManagement.GetFlourfromStock');

    }
}