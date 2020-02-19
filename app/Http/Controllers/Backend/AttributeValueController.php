<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $attributeValue=AttributeValue::with('AttributeGroup')->paginate(10);
//      return $attributeValue;
      return view('viewbackend.attributes-value.index',compact('attributeValue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$attribute_group=AttributeGroup::all();

       return view('viewbackend.attributes-value.create',compact('attribute_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute=new AttributeValue();
        $attribute->title=$request->input('title');
        $attribute->attributeGroup_id=$request->input('type');
        $attribute->save();
        Session::flash('create_attributeValue','مقدار ویژگی  جدید '. $attribute->title.' با موفقیت ثبت شد. ');
        return redirect('main/attributes-value');
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
        $attribute=AttributeValue::with('AttributeGroup')->findOrFail($id);
        $attribute_group=AttributeGroup::all();
        return view('viewbackend.attributes-value.edit',compact(['attribute','attribute_group']));
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
        $attribute=AttributeValue::findOrFail($id);
        $attribute->title=$request->input('title');
        $attribute->attributeGroup_id=$request->input('type');
        $attribute->save();
        Session::flash('update_attributeValue','مقذار ویژگی '. $attribute->title.' با موفقیت ویرایش شد. ');
        return redirect('main/attributes-value');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute=AttributeValue::findOrFail($id);
        $attribute->delete();
        Session::flash('delete_attributeValue','مقدار ویژگی   '. $attribute->title.' حذف شد. ');
        return redirect('main/attributes-value');
    }
}
