<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreProductTypeRequest;
class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProductType(){
        $productType = ProductType::all();
        $category = Category::all();
        return response()->json(['productType'=>$productType,'category'=>$category]);
    }
    public function index()
    {
        $category = Category::where('status',1)->get();
        $productType = ProductType::paginate(5);
        return view('admin.pages.productType.list',compact('productType','category'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('admin.pages.productType.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        $productType = $request->all();
        ProductType::create($productType);
        return response()->json([$productType,'success'=>'Thêm thành công']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType,$id)
    {
        $productType = ProductType::find($id);
        $category = Category::where('status',1)->get();
        return response()->json(['productType'=>$productType,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $productType = ProductType::find($id);
        $input = $request->all();
        $result = $productType->update($input);
        return response()->json([$result,'success'=>'Sửa thành Công']);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType,$id)
    {
        $productType = ProductType::find($id);
        if($productType){
            $productType->delete($id);
            return response()->json(['success'=>'xóa thành công']);
        }
    }
}
