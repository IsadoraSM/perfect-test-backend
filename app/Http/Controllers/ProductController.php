<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreProduct;
use App\Models\Product;
use Webpatser\Uuid\Uuid;

class ProductController extends Controller
{
    public function create()
    {
        $actionRoute = 'product.store';
        return view('crud_products', compact('actionRoute'));
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

    private function saveImage($image, $uuid){
        if(!$image){
            return 'img/product/default.png';
        }

        $extension = $image->getClientOriginalExtension();

        $nameFile = "productImage.$extension";

        $image->storeAs("public/productImages/$uuid", $nameFile);

        return "storage/productImages/$uuid/$nameFile";
    }
}
