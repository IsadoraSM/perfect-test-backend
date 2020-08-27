<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'uuid', 'description', 'price', 'local_image'];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }

}
