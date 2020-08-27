<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::orderBy('name')->get();
        
        $sales = Sale::orderBy('date')->orderBy('hour')->get();

        $result_sales = Sale::select('status', DB::raw('sum(final_price) as total'), DB::raw('count(id) as quantity'))
                            ->groupBy('status')
                            ->get();
                            
        return view('dashboard.index', compact('products', 'sales', 'result_sales'));
    }
}
