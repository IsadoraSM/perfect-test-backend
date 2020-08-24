<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id', 'uuid', 'client_name', 'client_email', 'client_cpf', 'date'];


}
