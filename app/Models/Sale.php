<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id', 'uuid', 'client_name', 'client_email', 'date' , 'client_cpf', 'local_image'];

    protected $casts = [
        'date' => 'datetime:d/m/Y'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
