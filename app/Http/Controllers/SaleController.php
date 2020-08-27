<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use App\Models\Product;
use App\Http\Requests\StoreSale;
use App\Models\Sale;

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::select('id', 'name')
                            ->orderBy('name')
                            ->get();

        return view('sale.create', compact('products'));
    }

    public function store(StoreSale $request)
    {
        $product = Product::find($request->product_id);
        
        if($request->discount){
            $final_price = $product->price - $request->discount;
        }else{
            $request->merge([
                'discount' => 0
            ]);

            $final_price = $product->price;
        }

        $uuid = Uuid::generate(4)->string;

        $request->merge([
            'uuid' => $uuid,
            'final_price' => $final_price
        ]);
        
        Sale::create($request->all());

        return redirect()->route('dashboard');
    }
}