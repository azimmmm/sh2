<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct($slug)
    {
        $product=Product::with('photo','category','brand')->whereSlug($slug)->first();
        $relatedProducts=Product::with('category')->whereHas('category',function ($q) use($product){
            $q->whereIn('id',$product->category);
        })->get();
//        dd($product);
//        dd($relatedProducts);
return view('viewfrontend.products.index',compact(['product','relatedProducts']));
    }
}
