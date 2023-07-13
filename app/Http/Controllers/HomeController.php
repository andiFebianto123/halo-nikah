<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
// use App\Models\Product;
use App\Models\Kategorie;
use App\Models\RangePrice;
use App\Models\TopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;
use App\Models\Popup;


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

        $price_range = RangePrice::orderBy('min', 'ASC')->get();

        $blogs = Blog::orderBy('id', 'DESC')->limit(6)->get();

        $popup = Popup::where('status', 1)->orderBy('id', 'DESC')->first();

        $this->merge_data('popup', $popup);

        $this->merge_data('blogs', $blogs);

        $this->merge_data('range_price', $price_range);

        $this->merge_data('top_products', $top_products);
        
        return view('frontend.page.home', $this->getEntry());
    }
}
