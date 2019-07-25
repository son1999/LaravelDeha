<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'name', 'slug', 'status'
    ];

    public function productType()
    {
        return $this->hasMany('App\Models\ProductTypes', 'idCategory', 'id');
    }

    public function showCategory()
    {
        $category = Category::all();
        return $category;
    }

    public function showPaginateCategory()
    {
        $category = Category::paginate(10);
        return $category;
    }

    public function add($input)
    {
        return $input = Category::create($input);;
    }

    public function findId($id)
    {
        return $categoy = Category::find($id);
    }

    public function updateCategory($input, $id)
    {
        $category = $this->findId($id);
        return $category->update($input);
    }
    public function whereStatusCategory(){
        $category = Category::where('status', 1)->get();
    }
    public function deleteCategory($id)
    {
        $category = $this->findId($id);
        if ($category) {
            return $category->delete();
        }
    }
}
