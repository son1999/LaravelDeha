<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class ProductType extends Model
{
    protected $table = 'producttype';
    protected $fillable = [
        'idCategory', 'name', 'slug', 'status'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Models\Category', 'idCategory', 'id');
    }

    public function showProductType()
    {
        return $productType = ProductType::all();
    }

    public function showPaginate()
    {
        return $productType = ProductType::paginate(5);
    }

    public function findId($id)
    {
        return $productType = ProductType::find($id);
    }

    public function updateProductType($input, $id)
    {
        $productType = $this->findId($id);
        return $productType->update($input);
    }

    public function deleteProductType($id)
    {
        $productType = $this->findId($id);
        if ($productType) {
            return $productType->delete();
        }
    }
}
