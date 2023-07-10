<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kategorie;
use App\Models\Product;
use App\Models\SpecialProduct;
// use App\Models\TopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;

class ProductController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Product Detail');
    }

    

    function index(Request $request){

        $this->setTitle('Product');

        // $kategories = Kategorie::where('name', '!=', 'Paket Lengkap')->where('status', 1)->get();
        $kategories = Kategorie::where('status', 1)->get();

        $products = Product::whereHas('vendor', function($query){
            $query->where('vendors.status', 1);
        })
        ->whereHas('kategori', function($query){
            // $query->where('kategories.name', '!=', 'Paket Lengkap')
            $query->where('kategories.status', 1);
        })
        ->where('status', 1);

        if($request->search){
            $products = $products->where('name', 'LIKE', '%'.$request->search.'%');
        }

        if($request->kategori){
            $products = $products->whereIn('kategori_id', $request->kategori);
        }

        if(($request->price_min != null) && ($request->price_max != null)){
            $min = $request->price_min;
            $max = $request->price_max;
            $products = $products->where(function($query) use($min, $max){
                $query->where('price', '>=', $min)
                ->where('price', '<=', $max);
            });
        }

        $page = 1;

        if($request->page){
            $page = $request->page;
        }

        $limit = 12;

        $offset = ($page * $limit) - $limit;

        $pagination = [
            'total' => $products->count(),
            'limit' => $limit,
            'page' => $page,
            'offset' => $offset,
        ];

        $products = $products->offset($offset)->limit($limit)->get();

        $pagination['draw'] = $products->count();

        $this->merge_data('products', $products);
        $this->merge_data('kategories', $kategories);
        $this->merge_data('pagination', $pagination);

        return view('frontend.page.shop', $this->getEntry());
    }

    function detail($id){
        $product = Product::where('id', $id)->first();

        $product_recomended = Product::whereHas('vendor', function($query){
            $query->where('vendors.status', 1);
        })->where('status', 1)
        ->where('id', '!=', $product->id)->inRandomOrder()->limit(4)->get();

        
        $special_product = SpecialProduct::where('product_id', $product->id)->first();

        $this->merge_data('special_product', $special_product);
        $this->merge_data('item', $product);
        $this->merge_data('product_recomended', $product_recomended);
        return view('frontend.page.product-detail', $this->getEntry());
    }

    // function index(){
    //     $kategori = Kategorie::where('status', 1)->get();
    //     $this->merge_data('kategori', $kategori);

    //     $date_now = Carbon::now();
        
    //     $top_products = TopProduct::whereHas('product.vendor', function($query){
    //         $query->where('vendors.status', 1)
    //         ->where('products.status', 1);
    //     })->where(function($query) use($date_now){
    //         $query->where('is_permanently', 1)
    //         ->orWhere(function($query) use($date_now){
    //             $query->where('date_start', '<=', $date_now)
    //                 ->where('date_end', '>=', $date_now);
    //         });
    //     })->get();
    //     $this->merge_data('top_products', $top_products);
        
    //     return view('frontend.page.home', $this->getEntry());
    // }
}
