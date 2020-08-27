<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::orderBy('name')->get();
        
        $sales = Sale::orderBy('date')->orderBy('hour')->get();

        return view('dashboard', compact('products', 'sales'));
    }
}
