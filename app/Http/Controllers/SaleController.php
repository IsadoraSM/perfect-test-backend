<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use App\Models\Product;
use App\Http\Requests\StoreSale;
use App\Models\Sale;
use App\Http\Requests\UpdateSale;

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
            $final_price = ($product->price * $request->quantity) - $request->discount;
        }else{
            $request->merge([
                'discount' => 0
            ]);

            $final_price = $product->price * $request->quantity;
        }

        $uuid = Uuid::generate(4)->string;

        $request->merge([
            'uuid' => $uuid,
            'final_price' => $final_price
        ]);
        
        Sale::create($request->all());

        return redirect()->route('dashboard');
    }

    public function edit($uuid)
    {
        $sale = Sale::where('uuid', $uuid)->first();

        $products = Product::select('id', 'name')
                            ->orderBy('name')
                            ->get();

        return view('sale.edit', compact('products', 'sale'));
    }

    public function update(UpdateSale $request, $uuid){
        $sale = Sale::where('uuid', $uuid)->first();
        
        $product = Product::find($request->product_id);

        if($request->discount){
            $final_price = ($product->price * $request->quantity) - $request->discount;
        }else{
            $request->merge([
                'discount' => 0
            ]);

            $final_price = $product->price * $request->quantity;
        }

        $uuid = Uuid::generate(4)->string;

        $request->merge([
            'uuid' => $uuid,
            'final_price' => $final_price
        ]);
        
        $sale->update($request->all());

        return redirect()->route('dashboard');
    }

    public function destroy($uuid){
        Sale::where('uuid', $uuid)->first()->delete();

        return redirect()->route('dashboard');
    }
}