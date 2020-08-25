<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::orderBy('name')->get();
        
        return view('dashboard', compact('products'));
    }
}
