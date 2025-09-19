<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::where('brand_id', $brand_id)->get();
        $brand->increment('visit_count');
        
        // Sort manuals by visit_count in descending order and reindex the array
        $sortedManuals = $manuals->sortByDesc('visit_count')->values(); 

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "totalVisits" => $brand->visit_count,
            "sortedManuals" => $sortedManuals
        ]);
    }
}
