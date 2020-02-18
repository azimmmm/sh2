<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

    public function getProductByCategory($id,$page=4)
    {
        $category=Category::with('children')->whereId($id)->get();
$categories=Category::where('parent_id',null)->with('childRecursive')->get();
        $productscat=Product::with('photo')->where('category_id',$category[0]->id)->paginate($page);
//        dd($category[0]->name);
//        dd($category[0]->children[0]->name);
//        dd($category[0]->children);
//        dd($category);
//dd($productscat[0]->title);
        return view('viewfrontend.categories.index',compact(['category','productscat','categories']));

    }
    public function searchProduct()
    {
        $query = Input::get('search');

        $products = Product::with('brand', 'category', 'photo')
            ->where('title', 'like', "%" . $query . "%")
            ->paginate(5);
//        foreach ($products->items() as $product){
//            dd($product);
//    }
//        dd($products);
        $categories=Category::all();
        return view('viewfrontend.products.search',compact(['products','categories','query']));
    }

}
