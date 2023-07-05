<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use App\Models\TopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiCoreController extends Controller
{
    function showProvince(Request $request){
        // test git
        // $params = [];
        // if($request->name != null){
        //     $params['name'] = $request->name;
        // }

        // if($request->id != null){
        //     $params['id'] = $request->id;
        // } 

        // $response = Http::get('https://api.sevenmediatech.com/provinsi', $params);

        $province_options = [];
        $response = new Province;
        if($request->name != null){
            $response = $response->where('name', 'LIKE', '%'.$request->name.'%');
        }
        if($request->id != null){
            $response = $response->where('id', $request->id);
        }
        $response = $response->get();

        if($response->count() > 0){
            foreach($response as $province){
                $province_options[] = [
                    'id' => $province->id,
                    'text' => $province->name
                ];
            }
        }
        // if($response->status() == 200){
        //     $provinces = $response->json();
        //     if(array_key_exists('name', $provinces['content'])){
        //         $province_options[] = [
        //             'id' => $provinces['content']['id'],
        //             'text' => $provinces['content']['name'],
        //         ];
        //     }else{
        //         foreach($provinces['content'] as $province){
        //             $province_options[] = ['id' => $province['id'], 'text' => $province['name']];
        //         }
        //     }
        // }
        return response()->json([
            'result' => $province_options,
        ], 200);
    }

    function showCity(Request $request){
        $id_province = $request->province_id;
        $province_options = [];

        $params = [];

        $response = new City();

        if($id_province == null || $id_province == ''){
            return response()->json([
                'result' => [],
            ]);
        }else{
            $params['province_id'] = $request->province_id;
            $response = $response->where('province_id', $request->province_id);
        }

        $response = $response->get();

        if($response->count() > 0){
            foreach($response as $item){
                $province_options[] = [
                    'id' => $item->id,
                    'text' => $item->name,
                ];
            }
        }

        // $response = Http::get('https://api.sevenmediatech.com/kota', $params);
        // if($response->status() == 200){
        //     $provinces = $response->json();
        //     if(array_key_exists('name', $provinces['content'])){
        //         $province_options[] = [
        //             'id' => $provinces['content']['id'],
        //             'text' => $provinces['content']['name'],
        //         ];
        //     }else{
        //         foreach($provinces['content'] as $province){
        //             $province_options[] = ['id' => $province['id'], 'text' => $province['name']];
        //         }
        //     }
        // }
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

    function uploadImage(Request $request){
        if($request->upload != null){
            $filenameWithExt = $request->upload->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->upload->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $filename.'.'.$extension;
            
            if (Storage::exists('public/images/permalink/'.$fileNameToStore1)) {
                Storage::delete('public/images/permalink/'.$fileNameToStore1);
            }
            
            $path = $request->upload->storeAs('public/images/permalink',$fileNameToStore1);
            return response()->json([
                'url' => url('/').''.Storage::url('images/permalink/'.$fileNameToStore1),
                'result' => true,
            ]);
        }
        return response()->json([
            'message' => 'Upload is not valid',
            'result' => false,
            'url' => false,
        ], 403);
    }
}
