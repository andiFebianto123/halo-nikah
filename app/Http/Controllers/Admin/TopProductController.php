<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Kategorie;
use App\Models\TopProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;
use PhpParser\Node\Stmt\TryCatch;

class TopProductController extends AdminController
{

    function setup(){
        $this->crud->set_url('product-top');
        $this->crud->set_model(TopProduct::class);
        $this->crud->set_title(mb_ucfirst('top product'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'image_product',
            'label' => 'Gambar Produk',
            'type' => 'function',
            'function' => function($item){
                $img_1 = $item->product->product_image_1;
                $img_2 = $item->product->product_image_2;
                $img_3 = $item->product->product_image_3;
                $img_4 = $item->product->product_image_4;

                if($img_1){
                    return '<img 
                        class="tbl-thumb" 
                        src="'.url('storage/images/product/'.$img_1).'" 
                        width="20" height="40" alt="Product Image">';
                }

                if($img_2){
                    return '<img 
                        class="tbl-thumb" 
                        src="'.url('storage/images/product/'.$img_2).'" 
                        width="20" height="40" alt="Product Image">';
                }

                if($img_3){
                    return '<img 
                        class="tbl-thumb" 
                        src="'.url('storage/images/product/'.$img_3).'" 
                        width="20" height="40" alt="Product Image">';
                }

                if($img_4){
                    return '<img 
                        class="tbl-thumb" 
                        src="'.url('storage/images/product/'.$img_4).'" 
                        width="20" height="40" alt="Product Image">';
                }

                return '<img 
                    class="tbl-thumb" 
                    src="'.url('storage/images/product/product-default.jpg').'" 
                    width="20" height="40" alt="Product Image">';
            }
        ]);

        $this->crud->add_column([
            'name' => 'vendor_id',
            'label' => 'Vendor',
            'type' => 'function',
            'search' => function($value, $query){
                return $query->orWhereHas('product.vendor', function($q) use($value){
                    $q->where('vendors.name', 'LIKE', '%'.$value.'%');
                });
            },
            'orderable' => true,
            'orderLogic' => function($query, $column, $direction){
                return $query
                ->leftJoin('products', 'products.id', '=', 'top_products.product_id')
                ->leftJoin('vendors', 'vendors.id', '=', 'products.vendor_id')
                ->orderBy('vendors.name', $direction)->select('top_products.*');
            },
            'function' => function($item){
                return $item->product->vendor->name;
            }
        ]);

        $this->crud->add_column([
            'name' => 'product_id',
            'label' => 'Nama Produk',
            'orderlable' => true,
            'type' => 'function',
            'function' => function($item){
                return $item->product->name;
            },
            'search' => function($value, $query){
                return $query->orWhereHas('product', function($q) use($value){
                    $q->where('products.name', 'LIKE', '%'.$value.'%');
                });
            },
            'orderLogic' => function($query, $column, $direction){
                return $query->leftJoin('products', 'products.id', '=', 'top_products.product_id')
                ->orderBy('products.name', $direction)->select('top_products.*');
            },
        ]);

        $this->crud->add_column([
            'name' => 'is_permanently',
            'label' => 'Permanen',
            'type' => 'function',
            'function' => function($item){
                if($item->is_permanently){
                    return 'Yes';
                }
                return 'No';
            }
        ]);

        $this->crud->add_column([
            'name' => 'date_start',
            'label' => 'Tanggal Mulai',
            'type' => 'text',
        ]);

        $this->crud->add_column([
            'name' => 'date_end',
            'label' => 'Tanggal Berakhir',
            'type' => 'text',
        ]);

        // Add rule validation for create & update

        $this->crud->deny_access('info');
        // $this->crud->deny_access('update');
        // $this->crud->deny_access('delete');
    }

    function search(Request $request){
        // $this->crud->model = $this->crud->model->where('name', 'LIKE', '%kat%');
        return parent::search($request);
    }


    function get_validator(Array $rule, $request){
        $validator = Validator::make($request, $rule);

        $validator->sometimes('name', 'required|max:255', function ($input) {
            $c = Product::where('vendor_id', $input->vendor_id)
            ->where('name', $input->name)->first();
            return ($c === null);
        });

        if ($validator->fails()) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(redirect()->back()
            ->withErrors($validator->errors())
            ->withInput());
       }
    }

    function rule($id = null){
        return [
            'vendor_id' => 'required',
            'kategori_id' => 'required',
            'price' => 'required|integer',
            'name' => 'required|max:255',
            'product_image_1' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'product_image_2' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'product_image_3' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'product_image_4' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.top-product');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.top-product', [
            'item' => $item,
            'id' => $id,
        ]);
    }


    function update($id, $request = []){
        $request = request();
        $product_id = $request->product_id;
        $is_permanently = $request->is_permanently;
        $date_start = ($request->date_start != null) ? Carbon::create($request->date_start) : null;
        $date_end = ($request->date_end != null) ? Carbon::create($request->date_end) : null;

        $errors = [];

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|unique:top_products,product_id,'.$id,
            'date_start' => 'date:yyyy-mm-dd|nullable',
            'date_end' => 'date:yyyy-mm-dd|nullable',
            'is_permanently' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       if(($is_permanently == null) || ($is_permanently == 0)){
            if(($request->date_start != null) && ($request->date_end != null)){
                $nowDate = $date_start->startOfDay();
                $otherDate = $date_end->startOfDay();
        
                $result = $otherDate->gt($nowDate);

                if(!$result){
                    $errors['date_end'] = 'The end date must be greater than the start date';
                    $errors['date_start'] = 'The end date must be greater than the start date';
                }

            }else{
                $errors['date_start'] = 'The start date and end date must be filled in if you do not select permanent';
                $errors['date_end'] = 'The start date and end date must be filled in if you do not select permanent';
            }
       }

        DB::beginTransaction();
        try {

            $product = Product::where('id', $request->product_id)->first();
            if(($product->status != 1) || ($product->vendor->status != 1)){
                $errors['product_id'] = 'Product or Vendor status is inactive';
            }

            if(count($errors) > 0){
                return redirect()->back()
                ->withErrors($errors)
                ->withInput();
            }

            $top_product = TopProduct::where('id', $id)->first();
            $top_product->product_id = $product_id;
            $top_product->is_permanently = $is_permanently;
            $top_product->date_start = $date_start;
            $top_product->date_end = $date_end;
            $top_product->save();
            
            DB::commit();
            flash()->addSuccess('Your updated for top product has been submitted.');
            return redirect($this->crud->url);
        }catch(\Exception $e){
            DB::rollBack();
            flash()->addError($e->getMessage());
            return redirect()->back()->withInput();
        }

    }

    function store(Request $request){
        $product_id = $request->product_id;
        $is_permanently = $request->is_permanently;
        $date_start = ($request->date_start != null) ? Carbon::create($request->date_start) : null;
        $date_end = ($request->date_end != null) ? Carbon::create($request->date_end) : null;

        $errors = [];

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|unique:top_products,product_id',
            'date_start' => 'date:yyyy-mm-dd|nullable',
            'date_end' => 'date:yyyy-mm-dd|nullable',
            'is_permanently' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       if(($is_permanently == null) || ($is_permanently == 0)){
            if(($request->date_start != null) && ($request->date_end != null)){
                $nowDate = $date_start->startOfDay();
                $otherDate = $date_end->startOfDay();
        
                $result = $otherDate->gt($nowDate);

                if(!$result){
                    $errors['date_end'] = 'The end date must be greater than the start date';
                    $errors['date_start'] = 'The end date must be greater than the start date';
                }

            }else{
                $errors['date_start'] = 'The start date and end date must be filled in if you do not select permanent';
                $errors['date_end'] = 'The start date and end date must be filled in if you do not select permanent';
            }
       }

        DB::beginTransaction();
        try{

            $product = Product::where('id', $request->product_id)->first();
            if(($product->status != 1) || ($product->vendor->status != 1)){
                $errors['product_id'] = 'Product or Vendor status is inactive';
            }

            if(count($errors) > 0){
                    return redirect()->back()
                    ->withErrors($errors)
                    ->withInput();
            }

            $top_product = new TopProduct;
            $top_product->product_id = $product_id;
            $top_product->is_permanently = $is_permanently;
            $top_product->date_start = $date_start;
            $top_product->date_end = $date_end;
            $top_product->save();

            DB::commit();
            flash()->addSuccess('Your top product has been submitted.');
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                flash()->addError($e->getMessage());
                return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {   
        DB::beginTransaction();
        try {
            $delete = parent::destroy($id);
            DB::commit();
            return $delete;
        }catch(\Exception $e){
            DB::rollBack();
            return false;
        }
    }

}
