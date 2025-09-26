<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Manual;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category_id, $category_slug)
    {
        $category = Category::findOrFail($category_id);
        $brands = Brand::where('category_id', $category_id)->get();

        return view('pages/brand_list', [
            "category" => $category,
            "brands" => $brands
        ]);
    }
}
