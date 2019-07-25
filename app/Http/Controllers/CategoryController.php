<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use mysql_xdevapi\BaseResult;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTable()
    {
        $category = $this->category->showCategory();
        return response()->json($category);
    }

    public function index()
    {
        $category = $this->category->showPaginateCategory();
        return view('admin.pages.category.list', compact('category'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        if ($input) {
            $category = $this->category->add($input);
            return response()->json([$category, 'success' => 'Thêm thành công']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Respons
     */
    public function show($id)
    {
        //-
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->findId($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $input = $request->all();
        if ($input) {
            $category = $this->category->updateCategory($input, $id);
            return response()->json([$category, 'success' => 'Sửa thành công']);
        }
    }

    /**
     * Remove the specified resource from storage.*
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->deleteCategory($id);
        if ($category) {
            return response()->json(['success' => 'Xóa thành công']);
        }
    }
}
