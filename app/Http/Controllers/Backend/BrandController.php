<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('viewbackend.brands.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewbackend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();
        $brand->title = $request->input('title');

        $brand->desc = $request->input('desc');

        $brand->photo_id = $request->input('photo_id');
        $brand->save();
        Session::flash('add_brand', 'برند با موفقیت ثبت شد');
        return redirect('/main/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::with('photo')
            ->where('id', $id)
            ->first();
//        $photo = $brand->photo;

        return view('viewbackend.brands.edit', compact(['brand']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->title = $request->input('title');

        $brand->desc = $request->input('desc');

        $brand->photo_id = $request->input('photo_id');
        $brand->save();
        Session::flash('update_brand', $brand->title);
        return redirect('/main/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $photo=Photo::findOrFail($brand->photo_id);

        unlink(public_path(). $brand->photo->path);
        $brand->delete();
        $photo->delete();


        Session::flash('delete_brand', 'برند ' . $brand->name . ' حذف شد.');

        return redirect('/main/brands');

    }
}
