<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\RangePrice;
use App\Http\Controllers\ContentController;

class PackageProductController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Paket Produk');
    }

    function index(){
        // $this->merge_data('top_products', $top_products);

        $request = request();

        $products = Product::whereHas('vendor', function($query){
            $query->where('vendors.status', 1);
        })
        ->whereHas('kategori', function($query){
            $query->where('kategories.name', '=', 'Paket Lengkap')
            ->where('kategories.status', 1);
        })
        ->where('status', 1);

        if($request->search){
            $products = $products->where('name', 'LIKE', '%'.$request->search.'%');
        }

        if($request->kategori){
            $products = $products->whereIn('kategori_id', $request->kategori);
        }

        if(($request->min != null) && ($request->max != null)){
            $min = $request->min;
            $max = $request->max;
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

        $range_price = RangePrice::get();

        $this->merge_data('range_price', $range_price);

        $this->merge_data('products', $products);
        $this->merge_data('pagination', $pagination);

        
        return view("frontend.page.package", $this->getEntry());
    }
}
