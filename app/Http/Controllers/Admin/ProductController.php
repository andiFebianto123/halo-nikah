<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use App\Models\Product;
use App\Models\Kategorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\View;

class ProductController extends AdminController
{

    function setup(){
        $this->crud->set_url('product');
        $this->crud->set_model(Product::class);
        $this->crud->set_title(mb_ucfirst('product'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'name',
            'label' => 'Nama',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->where('products.name', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'vendor_id',
            'label' => 'Vendor',
            'type' => 'function',
            'search' => function($value, $query){
                return $query->orWhereHas('vendor', function($q) use($value){
                    $q->where('vendors.name', 'LIKE', '%'.$value.'%');
                });
            },
            'orderable' => true,
            'orderLogic' => function($query, $column, $direction){
                return $query->leftJoin('vendors', 'vendors.id', '=', 'products.vendor_id')
                ->orderBy('vendors.name', $direction)->select('products.*');
            },
            'function' => function($item){
                return $item->vendor->name;
            }
        ]);

        $this->crud->add_column([
            'name' => 'kategori_id',
            'label' => 'Kategori',
            'type' => 'function',
            'search' => function($value, $query){
                return $query->orWhereHas('kategori', function($q) use($value){
                    $q->where('kategories.name', 'LIKE', '%'.$value.'%');
                });
            },
            'orderable' => true,
            'orderLogic' => function($query, $column, $direction){
                return $query->leftJoin('kategories', 'kategories.id', '=', 'products.kategori_id')
                ->orderBy('kategories.name', $direction)->select('products.*');
            },
            'function' => function($item){
                return $item->kategori->name;
            }
        ]);

        $this->crud->add_column([
            'name' => 'rate',
            'label' => 'Rating',
            'type' => 'function',
            'orderable' => true,
            'function' => function($item){
                $rate = '<div class="ec-t-rate">';
                for($i = 1; $i<=5; $i++){
                    if($i <= $item->rate){
                        $rate .= '<i class="mdi mdi-star is-rated"></i>';
                    }else{
                        $rate .= '<i class="mdi mdi-star"></i>';
                    }
                }
                $rate .= '</div>';
                return $rate;
            }
        ]);

        $this->crud->add_column([
            'name' => 'detail',
            'label' => 'Detail',
            'type' => 'function',
            'orderable' => false,
            'function' => function($item){
                return '<span>'.htmlspecialchars(Str::limit($item->detail, 100, '...')).'</span>';
            },
            'width' => 200,
        ]);

        $this->crud->add_column([
            'name' => 'product_image_1',
            'label' => 'Gambar Produk 1',
            'type' => 'image_product',
            'orderable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'product_image_2',
            'label' => 'Gambar Produk 2',
            'type' => 'image_product',
            'orderable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'product_image_3',
            'label' => 'Gambar Produk 3',
            'type' => 'image_product',
            'orderable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'product_image_4',
            'label' => 'Gambar Produk 4',
            'type' => 'image_product',
            'orderable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'discounted_price',
            'type' => 'function',
            'function' => function($item){
                return "Rp " . number_format($item->discounted_price,2,',','.');
            },
            'label' => 'Harga Sebelumnya',
            'orderlable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'price',
            'type' => 'function',
            'function' => function($item){
                return "Rp " . number_format($item->price,2,',','.');
            },
            'label' => 'Harga Sekarang',
            'orderlable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'function',
            'orderable' => true,
            'function' => function($item){
                if($item->status == 1){
                    return '<span class="badge bg-success">Active</span>';
                }
                return '<span class="badge bg-danger">Inactive</span>';
            }
        ]);

        $this->crud->set_filter('product');
        // Add rule validation for create & update

        $this->crud->deny_access('info');
        // $this->crud->deny_access('update');
        // $this->crud->deny_access('delete');
    }

    function search(Request $request){
        // $this->crud->model = $this->crud->model->where('name', 'LIKE', '%kat%');
        if(request()->kategori_id != null){
            $this->crud->model = $this->crud->model->where('kategori_id', request()->kategori_id);
        }
        if(request()->vendor_id != null){
            $this->crud->model = $this->crud->model->whereIn('vendor_id', request()->vendor_id);
        }
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
        $kategories = Kategorie::where('status', 1)->get();
        $vendor = Vendor::where('status', 1)->get();
        return $this->admin_view('create.product', [
            'option_categories' => $kategories,
            'option_vendor' => $vendor,
        ]);
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        $kategories = Kategorie::where('status', 1)->get();
        $vendor = Vendor::where('status', 1)->get();
        return $this->admin_view('edit.product', [
            'option_categories' => $kategories,
            'option_vendor' => $vendor,
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $req = request();

        $req->request->remove('_token');

        $errors = [];

        $validator = Validator::make($req->all(), $this->rule());

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       $item = $this->crud->model->where('id', $id)->first();

       if($item->vendor_id == $req->vendor_id){
            $product = Product::where('vendor_id', $req->vendor_id)
            ->where('name', $req->name)
            ->where('id', '!=', $id)->first();
       }else{
            $product = Product::where('vendor_id', $req->vendor_id)
            ->where('name', $req->name)->first();
       }

        if($product != null){
            $errors['name'] = 'the product name already exists with the same vendor';
        }

        if(count($errors) > 0){
            return redirect()->back()
            ->withErrors($errors)
            ->withInput();
        }

        $req_data = $req->all();

        DB::beginTransaction();
        try{
            // image upload
            if($req->product_image_1 != null){
                $filenameWithExt = $req->product_image_1->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $req->product_image_1->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                $path = $req->product_image_1->storeAs('public/images/product',$fileNameToStore1);
                $req_data['product_image_1'] = $fileNameToStore1;
            }

            if($req->product_image_2 != null){
                $filenameWithExt = $req->product_image_2->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $req->product_image_2->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
                $path = $req->product_image_2->storeAs('public/images/product',$fileNameToStore2);
                $req_data['product_image_2'] = $fileNameToStore2;
            }

            if($req->product_image_3 != null){
                $filenameWithExt = $req->product_image_3->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $req->product_image_3->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
                $path = $req->product_image_3->storeAs('public/images/product',$fileNameToStore3);
                $req_data['product_image_3'] = $fileNameToStore3;
            }

            if($req->product_image_4 != null){
                $filenameWithExt = $req->product_image_4->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $req->product_image_4->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore4 = $filename.'_'.time().'.'.$extension;
                $path = $req->product_image_4->storeAs('public/images/product',$fileNameToStore4);
                $req_data['product_image_4'] = $fileNameToStore4;
            }

            parent::update($id, $req_data);
            DB::commit();
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                flash()->addError($e->getMessage());
                return redirect()->back()->withInput();
        }
    }

    function store(Request $request){
        $name = $request->name;
        $vendor_id = $request->vendor_id;
        $kategori_id = $request->kategori_id;
        $detail = $request->detail;
        $terms_and_condition = $request->terms_and_condition;
        $discounted_price = $request->discounted_price;
        $price = $request->price;
        $rate = $request->rate;

        // image
        $product_image_1 = $request->product_image_1;
        $product_image_2 = $request->product_image_2;
        $product_image_3 = $request->product_image_3;
        $product_image_4 = $request->product_image_4;

        $status = $request->status;

        $errors = [];

        // $this->get_validator($this->rule(), $request->all());

        $validator = Validator::make($request->all(), $this->rule());

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

        $product = Product::where('vendor_id', $request->vendor_id)
        ->where('name', $request->name)->first();

        if($product != null){
            $errors['name'] = 'the product name already exists with the same vendor';
        }

        DB::beginTransaction();
        try{

            if(count($errors) > 0){
                return redirect()->back()
                ->withErrors($errors)
                ->withInput();
            }

            // image upload
            if($product_image_1 != null){
                    $filenameWithExt = $product_image_1->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $product_image_1->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                    $path = $product_image_1->storeAs('public/images/product',$fileNameToStore1);
                    $product_image_1 = $fileNameToStore1;
            }

            if($product_image_2 != null){
                $filenameWithExt = $product_image_2->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $product_image_2->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
                $path = $product_image_2->storeAs('public/images/product',$fileNameToStore2);
                $product_image_2 = $fileNameToStore2;
            }

            if($product_image_3 != null){
                $filenameWithExt = $product_image_3->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $product_image_3->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
                $path = $product_image_3->storeAs('public/images/product',$fileNameToStore3);
                $product_image_3 = $fileNameToStore3;
            }

            if($product_image_4 != null){
                $filenameWithExt = $product_image_4->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $product_image_4->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore4 = $filename.'_'.time().'.'.$extension;
                $path = $product_image_4->storeAs('public/images/product',$fileNameToStore4);
                $product_image_4 = $fileNameToStore4;
            }


            $produk = new Product;
            $produk->name = $name;
            $produk->detail = $detail;
            $produk->vendor_id = $vendor_id;
            $produk->kategori_id = $kategori_id;
            $produk->rate = $rate;
            $produk->terms_and_condition = $terms_and_condition;
            $produk->discounted_price = $discounted_price;
            $produk->price = $price;
            $produk->product_image_1 = $product_image_1;
            $produk->product_image_2 = $product_image_2;
            $produk->product_image_3 = $product_image_3;
            $produk->product_image_4 = $product_image_4;
            $produk->status = $status;
            $produk->save();
            DB::commit();
            flash()->addSuccess('Your product has been submitted.');
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
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

    function get_product(){
        $id = request()->product_id;
        $item = Product::where('id', $id)->first();
        return response()->json([
            'html' => View::make('frontend.components.detail-product')
            ->with('item', $item)->render()
        ], 200);
    }

}
