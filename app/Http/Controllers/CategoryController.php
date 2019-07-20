<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use mysql_xdevapi\BaseResult;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function showTable(){
        $category = Category::all();
        return response()->json($category);
    }
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.pages.category.list',compact('category'));
//      return response()->json([$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => $request->name,
            'status' => $request->status,
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $validate = Validator::make($request->all(),
         [
             'name' => 'required|min:2|max:255 ',
         ],
         [
             'required' => 'Tên danh mục sản phẩm không được để trống',
             'min' => 'Tên danh mục sản phẩm tối thiểu 2 kí tự',
             'max' => 'Tên danh mục sản phẩm tối đa 255 kí tự',

         ]
         );
         if($validate->fails()){
             return response()->json(['error'=>'true','message'=>$validate->errors()],200);
         }
         $category = Category::find($id);
         $category->update([
             'name' => $request->name,
             'slug' => $request->name,
             'status' => $request->status,
         ]);
         return response()->json([$category,'success'=>'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.*
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['success'=>'Xóa thành công']);
    }
}