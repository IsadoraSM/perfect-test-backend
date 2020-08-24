<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['name', 'uuid', 'description', 'price', 'local_image'];
}
