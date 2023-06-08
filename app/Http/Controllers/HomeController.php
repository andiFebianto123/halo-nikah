<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kategorie;
// use App\Models\Product;
use App\Models\TopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;

class HomeController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Home');
    }

    function index(){
        $kategori = Kategorie::where('status', 1)->get();
        $this->merge_data('kategori', $kategori);

        $date_now = Carbon::now();
        
        $top_products = TopProduct::whereHas('product.vendor', function($query){
            $query->where('vendors.status', 1)
            ->where('products.status', 1);
        })->where(function($query) use($date_now){
            $query->where('is_permanently', 1)
            ->orWhere(function($query) use($date_now){
                $query->where('date_start', '<=', $date_now)
                    ->where('date_end', '>=', $date_now);
            });
        })->get();
        $this->merge_data('top_products', $top_products);
        
        return view('frontend.page.home', $this->getEntry());
    }
}
