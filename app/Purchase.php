<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    private $id; 
    private $supplier_id;
    private $date;
    private $purchase_item;
    private $quantity;
    private $unit_price;
    private $transaction_method;
    private $cash_amount;
    private $is_paddy;
    

    public function suppliers(){
        return $this->belongsTo(Supplier::class);
    }
    
    public function cheques(){
        return $this->hasMany(Cheque::class);
    }
    
}
