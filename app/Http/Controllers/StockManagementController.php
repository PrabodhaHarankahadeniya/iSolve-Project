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
    public function getPaddyRiceStockExchange()
    {
        $sambaQuantity=null;
        $paddyEntries=null;
        return view('stockManagement.PaddyRiceStockExchange',compact('sambaQuantity','paddyEntries'));
    }
    public function getRiceFlourStockExchange()
    {
        //$sambaQuantity=null;
        return view('stockManagement.RiceFlourStockExchange');
    }
    public function PaddyRiceStockExchange(Request $request)
    {
            $sambaQuantity=null;
            return view('stockManagement.PaddyRiceStockExchange',compact('sambaQuantity'));

            /*$fromDate = $request['fromDate'];
            $toDate = $request['toDate'];
            $paddyEntries = \DB::table('paddy_entries')
                ->where('paddy_entries.date', '>=', $fromDate)
                ->where('paddy_entries.date', '<=', $toDate)->where('paddy_entries.transfer_status', '==', "remove")
                //   ->select('paddy_entries.type', 'paddy_entries.quantity_in_kg')
                ->select('paddy_entries.type', 'paddy_entries.quantity_in_kg')
                ->get();
            $sambaQuantity = 0;
            foreach ($paddyEntries as $entry) {
                if ($entry->type == "Samba") {
                    $sambaQuantity = $sambaQuantity + $entry->quantity_in_kg;
                }
            }
            $riceEntries = \DB::table('paddy_entries')
                ->where('paddy_entries.date', '>=', $fromDate)
                ->where('paddy_entries.date', '<=', $toDate)->where('paddy_entries.transfer_status', '==', "remove")
                //   ->select('paddy_entries.type', 'paddy_entries.quantity_in_kg')
                ->select('paddy_entries.type', 'paddy_entries.quantity_in_kg')
                ->get();
            return view('stockManagement.PaddyRiceStockExchange', compact('sambaQuantity'));*/


    }
    public function RiceFlourStockExchange(){
        $error=null;
        return view('stockManagement.RiceStocktoFlourMill',compact('error'));

    }
}