<?php

namespace App\Http\Controllers\Admin;

use App\Models\SliderBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AdminController;

class SliderBannerController extends AdminController
{

    function setup(){
        $this->crud->set_url('widget-banner');
        $this->crud->set_model(SliderBanner::class);
        $this->crud->set_title(mb_ucfirst('Slider Banner'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 30,
        ]);

        $this->crud->add_column([
            'name' => 'order',
            'label' => 'Urutan',
            'type' => 'text',
            'width' => 50,
        ]);

        $this->crud->add_column([
            'name' => 'img',
            'label' => 'Gambar Banner',
            'type' => 'function',
            'orderable' => false,
            'function' => function($item){
                if($item->img){
                    return '<img 
                        class="tbl-thumb" 
                        src="'.url('storage/images/banner/'.$item->img).'" 
                        width="20" height="40" alt="Product Image">';
                }
                return '';
            }
        ]);

        $this->crud->add_column([
            'name' => 'title',
            'label' => 'Judul 1',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->where('title', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'sub_title',
            'label' => 'Judul 2',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->orWhere('sub_title', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'price',
            'type' => 'function',
            'function' => function($item){
                return "Rp " . number_format($item->price,2,',','.');
            },
            'label' => 'Harga',
            'orderlable' => true,
        ]);

        $this->crud->add_column([
            'name' => 'url',
            'label' => 'Link Action',
            'type' => 'text',
            'orderable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'button_text',
            'label' => 'Tombol Teks',
            'type' => 'text',
            'orderable' => false,
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
                'title' => 'required|unique:slider_banners,title,'.$id,
                'sub_title' => 'required',
                'img' => 'mimes:jpeg,jpg,png|max:10000',
                'price' => 'required|numeric',
                'order' => 'required|numeric|min:1',
                'button_text' => 'required',
                'url' => 'required',
                'status' => 'required',
            ];
        }
        return [
            'title' => 'required|unique:slider_banners,title',
            'sub_title' => 'required',
            'img' => 'mimes:jpeg,jpg,png|max:10000',
            'price' => 'required|numeric',
            'order' => 'required|numeric|min:1',
            'button_text' => 'required',
            'url' => 'required',
            'status' => 'required',
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.slider-banner');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.slider-banner', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $request = request();
        $request->request->remove('_token');

        $this->get_validator($this->rule($id), $request->all());

        $req = $request->all();

        $img = $request->img;

        DB::beginTransaction();
        try{
            // image banner upload
            if($img != null){
                $filenameWithExt = $img->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $img->getClientOriginalExtension();
                // Filename to store
                $fileNameToStoreBanner = $filename.'_'.time().'.'.$extension;
                $path = $img->storeAs('public/images/banner',$fileNameToStoreBanner);
                // remove array key for image banner path
                unset($req['img']);

                $req['img'] = $fileNameToStoreBanner;
            }else{
                unset($req['img']);
            }

            parent::update($id, $req);
            DB::commit();
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                flash()->addError($e->getMessage());
                return redirect()->back()->withInput();
        }
    }

    function store(Request $request){
        $img = $request->img;

        $this->get_validator($this->rule(), $request->all());

        DB::beginTransaction();
        try{

            // image banner upload
            if($img != null){
                $filenameWithExt = $img->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $img->getClientOriginalExtension();
                // Filename to store
                $fileNameToStoreBanner = $filename.'_'.time().'.'.$extension;
                $path = $img->storeAs('public/images/banner',$fileNameToStoreBanner);
            }else{
                $fileNameToStoreBanner = 'default-banner.jpg';
            }

            $create = new SliderBanner;
            $create->img = $fileNameToStoreBanner;
            $create->title = $request->title;
            $create->sub_title = $request->sub_title;
            $create->price = $request->price;
            $create->order = $request->order;
            $create->button_text = $request->button_text;
            $create->url = $request->url;
            $create->status = $request->status;
            $create->save();

            DB::commit();
            flash()->addSuccess('Your slide banner has been submitted.');
            return redirect($this->crud->url);
        }catch(\Exception $e){
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
