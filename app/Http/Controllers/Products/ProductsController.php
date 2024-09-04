<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\http\Request;
use App\Models\Product\Product;


class ProductsController extends Controller
{

    public function singleProduct($id) {

        $product = Product::find($id); 

        $relatedProducts = Product::where('type',$product->type)
        ->where('id', '!=', $id)->take('4')
        ->orderBy('id', 'desc')
        ->get();
        return view('products.productsingle', compact('product', 'relatedProducts'));


    }

}
