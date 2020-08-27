<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreProduct;
use App\Models\Product;
use Webpatser\Uuid\Uuid;
use App\Http\Requests\UpdateProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(StoreProduct $request)
    {

        $uuid = Uuid::generate(4)->string;

        $local_image = $this->saveImage($request->image, $uuid);

        $request->merge([
            'uuid' => $uuid,
            'local_image' => $local_image
        ]);

        Product::create($request->all());

        return redirect()->route('dashboard');
    }

        
    public function edit($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        return view('product.edit', compact('product'));
    }

    public function update(UpdateProduct $request, $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        if($request->image){
            if($product->local_image != 'img/product/default.png'){
                Storage::delete($product->local_image);
            }

            $local_image = $this->saveImage($request->image, $uuid);

            $request->merge([
                'local_image' => $local_image
            ]);
        }

        $product->update($request->all());

        return redirect()->route('dashboard');
    }

    private function saveImage($image, $uuid){
        if(!$image){
            return 'img/product/default.png';
        }

        $extension = $image->getClientOriginalExtension();

        $nameFile = "productImage.$extension";

        $image->storeAs("public/productImages/$uuid", $nameFile);

        return "storage/productImages/$uuid/$nameFile";
    }

    public function destroy($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        if($product->local_image != 'img/product/default.png'){
            Storage::delete('public');
        }

        $product->sales()->delete();
        
        $product->delete();

        return redirect()->route('dashboard');
    }
}
