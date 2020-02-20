<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\AttributeValue;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//use Illuminate\support\Facades\Session
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('childRecursive')
            ->where('parent_id', null)
            ->paginate(10);
        return view('viewbackend.categories.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childRecursive')
            ->where('parent_id', null)
            ->get();

        return view('viewbackend.categories.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('title');
        $category->parent_id = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/main/categories');

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
        $categories = Category::with("childRecursive")
            ->where('parent_id', null)
            ->get();
        $category = Category::findOrFail($id);

        return view('viewbackend.categories.edit', compact(['category', 'categories']));
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
        $category = Category::findOrFail($id);

        $category->name = $request->input('title');
        $category->parent_id = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/main/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::with('childRecursive')->where('id', $id)->first();

        if (count($category->childRecursive) > 0)
            Session::flash('fail_delete_category','دسته '.$category->name.'  دارای زیر دسته می باشد و حذف آن امکانپذیر نمی باشد.');
                else{
            $category->delete();
            Session::flash('delete_category', 'دسته '.$category->name.' حذف شد.');
        }
       return redirect('/main/categories');
    }

    public function indexSetting($id)
    {
        $attributeGroups=AttributeGroup::all();
        $category=Category::findOrFail($id);
        return view('viewbackend.categories.Setting',compact(['category','attributeGroups']));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveSetting(Request $request, $id)
    {
$category=Category::FindOrFail($id);
$category->attributeGroups()->sync($request->attributeGroups);

return redirect()->to('main/categories');

    }

    public function apiIndex()
    {
        $categories = Category::with('childRecursive')
            ->where('parent_id', null)
            ->get();
        $response=[
            'categories'=>$categories
        ];
        return response()->json($response,200);
    }

    public function apiIndexAttribute(Request $request)
    {
        $categories=$request->all();
        $attributeGroup=AttributeGroup::with('attributesValue','categories')->whereHas('categories',function($q) use ($categories){
            $q->whereIn('categories.id',$categories);

        })->get();
        $response=[
            'attribute'=>$attributeGroup
        ];
        return response()->json($response,200);

    }
}
