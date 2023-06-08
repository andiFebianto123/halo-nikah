<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\TopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

//

class ApiCoreController extends Controller
{
    function showProvince(Request $request){
        
        $params = [];
        if($request->name != null){
            $params['name'] = $request->name;
        }

        if($request->id != null){
            $params['id'] = $request->id;
        }

        $province_options = [];
        $response = Http::get('https://api.sevenmediatech.com/provinsi', $params);
        if($response->status() == 200){
            $provinces = $response->json();
            if(array_key_exists('name', $provinces['content'])){
                $province_options[] = [
                    'id' => $provinces['content']['id'],
                    'text' => $provinces['content']['name'],
                ];
            }else{
                foreach($provinces['content'] as $province){
                    $province_options[] = ['id' => $province['id'], 'text' => $province['name']];
                }
            }
        }
        return response()->json([
            'result' => $province_options,
        ], 200);
    }

    function showCity(Request $request){
        $id_province = $request->province_id;
        $province_options = [];

        $params = [];

        if($id_province == null || $id_province == ''){
            return response()->json([
                'result' => [],
            ]);
        }else{
            $params['province_id'] = $request->province_id;
        }

        $response = Http::get('https://api.sevenmediatech.com/kota', $params);
        if($response->status() == 200){
            $provinces = $response->json();
            if(array_key_exists('name', $provinces['content'])){
                $province_options[] = [
                    'id' => $provinces['content']['id'],
                    'text' => $provinces['content']['name'],
                ];
            }else{
                foreach($provinces['content'] as $province){
                    $province_options[] = ['id' => $province['id'], 'text' => $province['name']];
                }
            }
        }
        return response()->json([
            'result' => $province_options,
        ], 200);
    }

    function getProduct(Request $request){
        $search_term = $request->input('q');
        $page = $request->input('page');
        $results = [];
        if($search_term){
            $products = Product::where('name', 'LIKE', '%'.$search_term.'%')
            ->where('status', 1)->limit(10)->get();
        }else{
            $products = Product::where('status', 1)->limit(10)->get();
        }

        foreach($products as $product){
            $results[] = [
                'id' => $product->id,
                'text' => $product->name . ' ' . '('.$product->vendor->name.')',
            ];
        }

        return response()->json([
            'result' => $results,
        ], 200);
    }
}
