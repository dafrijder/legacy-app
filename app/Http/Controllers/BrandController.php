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

        // Bereken het totaal aantal bezoeken voor alle manuals van dit merk
        $totalVisits = $manuals->sum('visit_count');

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "totalVisits" => $totalVisits,
        ]);
    }
}
