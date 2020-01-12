<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attributesGroup=AttributeGroup::paginate(10);
        return view('viewbackend.attributes.index',compact('attributesGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewbackend.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attribute=new AttributeGroup();
        $attribute->title=$request->input('title');
        $attribute->type=$request->input('type');
        $attribute->save();
        Session::flash('create_attribute',' ویژگی '.$attribute->title.' اضافه شد  ');
        return redirect('/main/attributes-group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute=AttributeGroup::findOrFail($id);
        return view('viewbackend.attributes.edit',compact(['attribute']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $attribute=AttributeGroup::findOrFail($id);
        $attribute->title=$request->input('title');
        $attribute->type=$request->input('type');
        $attribute->save();
        Session::flash('update_attribute','ویژگی   '. $attribute->title.' با موفقیت ویرایش شد. ');
        return redirect('/main/attributes-group');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $attribute=AttributeGroup::findOrFail($id);
        $attribute->delete();
        Session::flash('delete_attribute',' ویژگی '.$attribute->title.' حذف شد. ');
        return redirect('main/attributes-group');
    }
}
