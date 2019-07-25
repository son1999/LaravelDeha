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

    protected $productType;
    protected $category;

    public function __construct(ProductType $productType, Category $category)
    {
        $this->productType = $productType;
        $this->category = $category;
    }

    public function showProductType()
    {
        $productType = $this->productType->showProductType();
        $category = $this->category->showCategory();
        // $productType = ProductType::all();
        // $category = Category::all();
        return response()->json(['productType' => $productType, 'category' => $category]);
    }

    public function index()
    {
        $category = $this->category->showCategory();
        $productType = $this->productType->showProductType();
        return view('admin.pages.productType.list', compact('productType', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->showCategory();
        return view('admin.pages.productType.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        $productType = $request->all();
        ProductType::create($productType);
        return response()->json([$productType, 'success' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ProductType $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProductType $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType, $id)
    {
        $productType = $this->productType->findId($id);
        $category = $this->category->whereStatusCategory();
        return response()->json(['productType' => $productType, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductType $productType
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductTypeRequest $request, $id)
    {
        $productType = $this->productType->findId($id);
        $input = $request->all();
        if ($input && $productType) {
            $result = $this->productType->updateProductType($input, $id);
            return response()->json([$result, 'success' => 'Sửa thành Công']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ProductType $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType, $id)
    {
        $productType = $this->productType->deleteProductType($id);
        return response()->json(['success' => 'xóa thành công']);

    }
}
