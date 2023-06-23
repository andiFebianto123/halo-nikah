<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kategorie;
use App\Models\Vendor;
// use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;
use App\Models\Product;
use App\Models\City;

class VendorController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Vendor');
    }

    function index(Request $request){

        $kategories = Kategorie::where('status', 1)->get();

        $items = Vendor::where('status', 1);

        if($request->kategori){
            $items = $items->whereIn('kategori_id', $request->kategori);
        }

        $page = 1;

        if($request->page){
            $page = $request->page;
        }

        $limit = 12;

        $offset = ($page * $limit) - $limit;

        $pagination = [
            'total' => $items->count(),
            'limit' => $limit,
            'page' => $page,
            'offset' => $offset,
        ];

        $items = $items->offset($offset)->limit($limit)->get();

        $pagination['draw'] = $items->count();

        $this->merge_data('vendors', $items);
        $this->merge_data('kategories', $kategories);
        $this->merge_data('pagination', $pagination);

        return view('frontend.page.vendor', $this->getEntry());
    }

    function detail($id){

        $request = request();
        $this->setTitle('Vendor - nama vendor');

        $vendor = Vendor::where('id', $id)->first();

        $city = City::where('id', $vendor->city)->first();
        $this->merge_data('city', $city);

        
        $items = Product::where('vendor_id', $id)
        ->where('status', 1);

        $total_product = $items->count();
        $this->merge_data('total_product', $total_product);

        $page = 1;

        if($request->page){
            $page = $request->page;
        }

        $limit = 12;

        $offset = ($page * $limit) - $limit;

        $pagination = [
            'total' => $items->count(),
            'limit' => $limit,
            'page' => $page,
            'offset' => $offset,
        ];

        $items = $items->offset($offset)->limit($limit)->get();

        $pagination['draw'] = $items->count();

        $this->merge_data('pagination', $pagination);
        $this->merge_data('vendor', $vendor);
        $this->merge_data('products', $items);
        return view('frontend.page.vendor-detail', $this->getEntry());
    }
}
