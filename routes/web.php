<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductDetail;

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

Route::get('/', function () {
    return view('components.front.main');
});

Route::get('/shop', function () {
    $products = Product::with('productDetails')->with('productImages')->paginate(9);
    $tags = Product::select('tag')->distinct()->get();
    $categories = Category::with('products')->get();
    $brands = Brand::with('products')->get();
    return view('components.front.shop')->with(compact('products', 'categories', 'brands', 'tags'));
});
