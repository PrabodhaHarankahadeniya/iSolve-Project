<?php
namespace App\Http\Controllers;
use DB;
use App\RiceStock;
use App\PaddyStock;
use App\FlourStock;
use Illuminate\Http\Request;


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
        $fromDate=null;
        $toDate=null;
        $paddyTypes=null;
        $paddyAmounts=null;
        $riceAmountsTrue=null;
        $wrong=null;
        return view('stockManagement.PaddyRiceStockExchange',compact('paddyTypes','paddyAmounts','riceAmountsTrue','fromDate','toDate','wrong'));
    }
    
    public function getRiceFlourStockExchange()
    {
        $fromDate=null;
        $toDate=null;
        $riceTypes=null;
        $riceAmounts=null;
        $flourAmounts=null;
        $wrong=null;
        return view('stockManagement.RiceFlourStockExchange',compact('riceTypes','riceAmounts','flourAmounts','fromDate','toDate','wrong'));
    }
    
    public function PaddyRiceStockExchange(Request $request)
    {
        
        $riceTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal','KekuluSamba','SuduKekulu','Kekulu','RedKekulu','KekuluKiri'];
        $riceAmounts=['Samba'=>'0','Nadu'=>'0','RedSamba'=>'0','RedNadu'=>'0','KiriSamba'=>'0','Suvadal'=>'0','KekuluSamba'=>'0','SuduKekulu'=>'0','Kekulu'=>'0','RedKekulu'=>'0','KekuluKiri'=>'0'];
        $riceAmountsTrue=['Samba'=>'0','Nadu'=>'0','RedSamba'=>'0','RedNadu'=>'0','KiriSamba'=>'0','Suvadal'=>'0'];
        $paddyTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        $paddyAmounts=['Samba'=>'0','Nadu'=>'0','RedSamba'=>'0','RedNadu'=>'0','KiriSamba'=>'0','Suvadal'=>'0'];
            $fromDate = $request['fromDate'];
            $toDate = $request['toDate'];
       
        if($fromDate>$toDate){
            $wrong="Please enter a valid date range";
            $fromDate=null;
            $toDate=null;
            $paddyTypes=null;
            $paddyAmounts=null;
            $riceAmountsTrue=null;
            return view('stockManagement.PaddyRiceStockExchange', compact('paddyTypes', 'paddyAmounts', 'riceAmountsTrue', 'fromDate', 'toDate','wrong'));
        }
        else {

            $paddyEntries = \DB::table('paddy_entries')
                ->where('date', '>=', $fromDate)
                ->where('date', '<=', $toDate)
                ->where('transfer_status', 'remove')
                ->select('type', 'quantity_in_kg')
                ->get();
            foreach ($paddyEntries as $entry) {
                foreach ($paddyTypes as $type) {
                    if ($entry->type == $type) {
                        $paddyAmounts[$type] = $paddyAmounts[$type] + $entry->quantity_in_kg;
                    }
                }
            }

            $riceEntries = \DB::table('rice_entries')
                ->where('date', '>=', $fromDate)
                ->where('date', '<=', $toDate)
                ->where('transfer_status', 'add')
                ->select('type', 'quantity_in_kg')
                ->get();
            foreach ($riceEntries as $entry) {
                foreach ($riceTypes as $type) {
                    if ($entry->type == $type) {
                        $riceAmounts[$type] = $riceAmounts[$type] + $entry->quantity_in_kg;
                    }
                }
            }
            $riceAmountsTrue['Samba'] = $riceAmounts['Samba'] + $riceAmounts['KekuluSamba'];
            $riceAmountsTrue['Nadu'] = $riceAmounts['Nadu'] + $riceAmounts['SuduKekulu'];
            $riceAmountsTrue['RedSamba'] = $riceAmounts['RedSamba'] + $riceAmounts['Kekulu'];
            $riceAmountsTrue['RedNadu'] = $riceAmounts['RedNadu'] + $riceAmounts['RedKekulu'];
            $riceAmountsTrue['KiriSamba'] = $riceAmounts['KiriSamba'] + $riceAmounts['KekuluKiri'];
            $riceAmountsTrue['Suvadal'] = $riceAmounts['Suvadal'];
            $wrong=null;
            return view('stockManagement.PaddyRiceStockExchange', compact('paddyTypes', 'paddyAmounts', 'riceAmountsTrue', 'fromDate', 'toDate','wrong'));
        }

    }
    
    public function RiceFlourStockExchange(Request $request){
     
        $riceTypes=['SuduKekulu','RedKekulu'];
        $riceAmounts=['SuduKekulu'=>'0','RedKekulu'=>'0'];
        $flourTypes=['WhiteRiceFlour','RedKekuluFlour'];
        $flourAmounts=['RedKekuluFlour'=>'0','WhiteRiceFlour'=>'0'];
        $fromDate = $request['fromDate'];
        $toDate = $request['toDate'];
        if($fromDate>$toDate){
            $wrong="Please enter a valid date range";
            $fromDate=null;
            $toDate=null;
            $riceTypes=null;
            $riceAmounts=null;
            $flourAmounts=null;
            return view('stockManagement.RiceFlourStockExchange', compact('riceTypes','riceAmounts','flourAmounts','fromDate','toDate','wrong'));
        }
        else{
        
        
            $flourEntries = \DB::table('flour_entries')
                ->where('date','>=', $fromDate)
                ->where('date','<=', $toDate)
                ->where('transfer_status','add')
                ->select('type', 'quantity_in_kg')
                ->get();
            foreach ($flourEntries as $entry) {
                foreach ($flourTypes as $type) {
                    if ($entry->type == $type) {
                        $flourAmounts[$type] = $flourAmounts[$type] + $entry->quantity_in_kg;
                    }
                }
            }
    
            $riceEntries = \DB::table('rice_entries')
                ->where('date','>=', $fromDate)
                ->where('date','<=', $toDate)
                ->where('transfer_status','remove')
                ->select('type', 'quantity_in_kg')
                ->get();
            foreach ($riceEntries as $entry) {
                foreach ($riceTypes as $type) {
                    if ($entry->type == $type) {
                        $riceAmounts[$type] = $riceAmounts[$type] + $entry->quantity_in_kg;
                    }
                }
            }
            $wrong=null;    
            return view('stockManagement.RiceFlourStockExchange', compact('riceTypes','riceAmounts','flourAmounts','fromDate','toDate','wrong'));


        }
    }

}