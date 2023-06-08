<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;

class TestimonialController extends AdminController
{

    function setup(){
        $this->crud->set_url('widget-testimonial');
        $this->crud->set_model(Testimonial::class);
        $this->crud->set_title(mb_ucfirst('Testimonial'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'img',
            'label' => 'Thumbnail',
            'type' => 'image',
            'orderable' => false,
        ]);

        $this->crud->add_column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->where('name', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->where('title', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'function',
            'orderable' => false,
            'function' => function($item){
                return '<span>'.Str::limit($item->description, 100, '...').'</span>';
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
        return $this->admin_view('create.testimonial');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.testimonial', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $request = request();
        $image = $request->img;
        $request->request->remove('_token');

        // $this->get_validator($this->rule($id), $req->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:testimonials,name,'.$id,
            'title' => 'required',
            'description' => 'required',
            'img' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
        }

        DB::beginTransaction();
        try{
            // image upload
            if($image != null){
                $filenameWithExt = $image->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/images/permalink',$fileNameToStore);
                $request = $request->all();
                $request['img'] = $fileNameToStore;
            }else{
                $request = $request->all();
            }
            parent::update($id, $request);
            DB::commit();
            return redirect($this->crud->url);
        }catch (\Exception $e){
                DB::rollBack();
                flash()->addError($e->getMessage());
                return redirect()->back()->withInput();
        }
    }

    function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:testimonials,name',
            'title' => 'required',
            'description' => 'required',
            'img' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
        }

        $image = $request->img;

        DB::beginTransaction();
        try{
            // image upload
            $filenameWithExt = $image->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $image->storeAs('public/images/permalink',$fileNameToStore);
           
            $create = new Testimonial;
            $create->name = $request->name;
            $create->img = $fileNameToStore;
            $create->description = $request->description;
            $create->title = $request->title;
            $create->save();
            DB::commit();
            flash()->addSuccess('Your testimonial has been submitted.');
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
