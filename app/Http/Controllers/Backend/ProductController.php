<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('viewbackend.products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $brands = Brand::all();

        $categories =Category::with('childRecursive')
            ->where('parent_id',null)->get();


        return view('viewbackend.products.create',compact(['brands','categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|string
     */
    public function generateSku()
    {
        $number=mt_rand(1000,9999);
    if($this->checkSku($number)){
        return $this->generateSku();
    }
    return (string)$number;
    }

    public function checkSku($number)
    {
        return Product::where("sku",$number)->exists();

    }
    public function store(Request $request)
    {

        $product=new Product();

        $product->title=$request->input('title');
        $product->category_id =$request->input('category_parent');
        $product->long_desc =$request->input('long_desc');
        $product->short_desc =$request->input('short_desc');
        $product->discount_price =$request->input('discount_price');
        $product->price =$request->input('price');

        $product->status =$request->input('status');
        $product->brand_id =$request->input('brand');

        $product->user_id =8;

        if ($request->input('slug')) {
            $product->slug = make_slug($request->input('slug'));
        } else {
            $product->slug = make_slug($request->input('title'));
        }
        $product->sku =$this->generateSku();
//
        $product->photo_id = $request->input('photo_id');
        $product->save();
        Session::flash('add_product', 'محصول با موفقیت ثبت شد');
        return redirect('main/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
