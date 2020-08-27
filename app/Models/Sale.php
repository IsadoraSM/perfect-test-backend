<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['uuid', 'product_id', 'client_name', 'client_email', 'client_cpf', 'date', 'hour', 'quantity', 'discount', 'final_price' ,'status'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
