<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;	

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'name','slug','status'
    ];

    public function productType(){
        return $this->hasMany('App\Models\ProductTypes','idCategory','id');
    }

    public function showCategory()
    {
    	$cate = Category::all();
    	return $cate;
    }
    public function showPaginateCategory(){
    	$cate = Category::paginate(10);
    	return $cate;
    }
    public function add($input){
    	return $input = Category::create($input);;
    }
    public function findId($id){
    	return $categoy = Category::find($id);
    }
    public function updateCategory($input,$id){
    	$category = $this->findId($id);
    	return $category->update($input);
    }
    public function deleteCategory($id){
    	$category = $this->findId($id);
        if($category){
            return $category->delete();
        }
    }
}