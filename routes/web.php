<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
2017-10-30 setup for urls
Home:			/
Brand:			/52/AEG/
Type:			/52/AEG/53/Superdeluxe/
Manual:			/52/AEG/53/Superdeluxe/8023/manual/
				/52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:		/category/12/Computers/
*/

use App\Models\Brand;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NameController;
use App\Models\Category;
use App\Models\Manual;

// Homepage
Route::get('/', function () {
    $brands = Brand::all()->sortBy('name');
    $manuals = Manual::all()->sortBy('visit_count');
    $sortedManuals = $manuals->sortByDesc('visit_count')->values();
    $name = 'legacy-app';
    return view('pages.homepage', compact('brands', 'manuals'))->with('name', $name)->with('sortedManuals', $sortedManuals);
})->name('home');

// Page for product categories (not yet implemented)
Route::get('/categories', function () {
    $categories = Category::all()->sortBy('name');
    return view('pages.category', compact('categories'));
})->name('categories');

Route::get('/categories/{category_id}/{category_slug}/', [CategoryController::class, 'show']);

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

// Generate sitemaps
Route::get('/generateSitemap/', [SitemapController::class, 'generate']);

Route::get('/contact', function () {
    return view('pages.contactformulier');
});

Route::post('/contact', function (Request $request) {
    $data = "Naam: " . $request->name . "\n" .
            "E-mail: " . $request->email . "\n" .
            "Bericht: " . $request->message . "\n" .
            "-----------------------------\n";

    // Sla op in storage/app/contact.txt
    Storage::append('contact.txt', $data);

    return redirect('/contact')->with('success', 'Je bericht is opgeslagen!');
});