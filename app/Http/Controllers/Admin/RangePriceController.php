<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\RangePrice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;

class RangePriceController extends AdminController
{

    function setup(){
        $this->crud->set_url('widget-range-price');
        $this->crud->set_model(RangePrice::class);
        $this->crud->set_title(mb_ucfirst('Range Price'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'min',
            'type' => 'function',
            'function' => function($item){
                return "Rp " . number_format($item->min,2,',','.');
            },
            'label' => 'Harga Minimal',
            'orderlable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'max',
            'type' => 'function',
            'function' => function($item){
                return "Rp " . number_format($item->max,2,',','.');
            },
            'label' => 'Harga Maksimal',
            'orderlable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'ket',
            'label' => 'Keterangan',
            'type' => 'function',
            'orderable' => false,
            'function' => function($item){
                return '<span>'.Str::limit($item->ket, 100, '...').'</span>';
            },
            'width' => 200,
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

    function rule($id = null){
        if($id){
            return [
                'name' => 'required|unique:kategories,name,'.$id,
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            ];
        }
        return [
            'name' => 'required|unique:popups,name',
            'url' => 'nullable|url',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.range-price');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.range-price', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $request = request();
        $request->request->remove('_token');

        $min = $request->min;
        $max = $request->max;
        // $this->get_validator($this->rule($id), $req->all());
        $errors = [];
        $trigger_validation = 1;

        $validator = Validator::make($request->all(), [
            'min' => 'required|integer',
            'max' => 'required|integer',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       $range = RangePrice::where('id', $id)->first();

       if(($range->min == $min) && ($range->max == $max)){
            $trigger_validation = 0;
       }

       if($trigger_validation){
            if($min >= $max){
                $errors['min'] = 'Price min must be left than with price max';
            }else{

                $price_check_exists = RangePrice::where(function($query) use($min, $max){
                    $query->where(function($q) use($min, $max){
                        $q->where('min', '>=', $min)
                        ->whereRaw("$max >= min");
                    })->orWHere(function($q) use($min, $max){
                        $q->where('min', '<=', $min)
                        ->where('max', '>=', $max);
                    })->orWhere(function($q) use($min, $max){
                        $q->where('max', '>=', $min)
                        ->where('max', '<=', $max);
                    });
                })->where('id', '!=', $id)->first();

                if($price_check_exists){
                        $errors['min'] = 'Pre-existing price range';
                        $errors['max'] = 'Pre-existing price range';
                }
            }
       }

       if(count($errors) > 0){
            return redirect()->back()
            ->withErrors($errors)
            ->withInput();
        }

        DB::beginTransaction();
        try{
            parent::update($id, $request->all());
            DB::commit();
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                flash()->addError($e->getMessage());
                return redirect()->back()->withInput();
        }
    }

    function store(Request $request){
        $min = $request->min;
        $max = $request->max;
        $ket = $request->ket;

        // $this->get_validator($this->rule(), $request->all());
        $errors = [];

        $validator = Validator::make($request->all(), [
            'min' => 'required|integer',
            'max' => 'required|integer',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       if($min >= $max){
            $errors['min'] = 'Price min must be left than with price max';
       }else{
            $price_check_exists = RangePrice::where(function($q) use($min, $max){
                    $q->where('min', '>=', $min)
                    ->whereRaw("$max >= min");
            })->orWHere(function($q) use($min, $max){
                    $q->where('min', '<=', $min)
                    ->where('max', '>=', $max);
            })->orWhere(function($q) use($min, $max){
                    $q->where('max', '>=', $min)
                    ->where('max', '<=', $max);
            })->first();

            if($price_check_exists){
                    $errors['min'] = 'Pre-existing price range';
                    $errors['max'] = 'Pre-existing price range';
            }
       }

       

       if(count($errors) > 0){
            return redirect()->back()
            ->withErrors($errors)
            ->withInput();
        }

        DB::beginTransaction();
        try{
            
            $create = new RangePrice;
            $create->min = $min;
            $create->max = $max;
            $create->ket = $ket;
            $create->save();
            DB::commit();
            flash()->addSuccess('Your price range has been submitted.');
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
