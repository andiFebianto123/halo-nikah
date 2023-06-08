<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Popup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;

class PopupController extends AdminController
{

    function setup(){
        $this->crud->set_url('widget-popup');
        $this->crud->set_model(Popup::class);
        $this->crud->set_title(mb_ucfirst('popup'));

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
            'name' => 'description',
            'label' => 'Deskripsi',
            'type' => 'function',
            'orderable' => false,
            'function' => function($item){
                return '<span>'.Str::limit($item->description, 100, '...').'</span>';
            },
            'width' => 200,
        ]);
        

        $this->crud->add_column([
            'name' => 'url',
            'label' => 'URL',
            'type' => 'text',
            'orderable' => false,
            'search' => function($value, $query){
                return $query->orWhere('url', 'LIKE', '%'.$value.'%');
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
        return $this->admin_view('create.popup');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.popup', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $request = request();
        $image = $request->img;
        $request->request->remove('_token');
        $date_start = ($request->date_start != null) ? Carbon::create($request->date_start) : null;
        $date_end = ($request->date_end != null) ? Carbon::create($request->date_end) : null;

        // $this->get_validator($this->rule($id), $req->all());
        $errors = [];

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:pop_ups,name,'.$id,
            'url' => 'nullable|url',
            'date_start' => 'date:yyyy-mm-dd|nullable',
            'date_end' => 'date:yyyy-mm-dd|nullable',
            'img' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       if(($request->date_start != null) || ($request->date_end != null)){

            $date_validate = 1;

            if($request->date_start == null){
                $date_validate = 0;
                $errors['date_start'] = 'The start date and end date must be filled';
            }

            if($request->date_end == null){
                $date_validate = 0;
                $errors['date_end'] = 'The start date and end date must be filled';
            }

            if($date_validate > 0){
                $nowDate = $date_start->startOfDay();
                $otherDate = $date_end->startOfDay();
        
                $result = $otherDate->gt($nowDate);

                if(!$result){
                    $errors['date_end'] = 'The end date must be greater than the start date';
                    $errors['date_start'] = 'The end date must be greater than the start date';
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
        $name = $request->name;
        $url = $request->url;
        $description = $request->description;
        $image = $request->img;
        $date_start = ($request->date_start != null) ? Carbon::create($request->date_start) : null;
        $date_end = ($request->date_end != null) ? Carbon::create($request->date_end) : null;
        $status = $request->status;

        // $this->get_validator($this->rule(), $request->all());
        $errors = [];

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:pop_ups,name',
            'url' => 'nullable|url',
            'date_start' => 'date:yyyy-mm-dd|nullable',
            'date_end' => 'date:yyyy-mm-dd|nullable',
            'img' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput();
       }

       if(($request->date_start != null) || ($request->date_end != null)){

            $date_validate = 1;

            if($request->date_start == null){
                $date_validate = 0;
                $errors['date_start'] = 'The start date and end date must be filled';
            }

            if($request->date_end == null){
                $date_validate = 0;
                $errors['date_end'] = 'The start date and end date must be filled';
            }

            if($date_validate > 0){
                $nowDate = $date_start->startOfDay();
                $otherDate = $date_end->startOfDay();
        
                $result = $otherDate->gt($nowDate);

                if(!$result){
                    $errors['date_end'] = 'The end date must be greater than the start date';
                    $errors['date_start'] = 'The end date must be greater than the start date';
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
            // image upload
            $filenameWithExt = $image->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $image->storeAs('public/images/permalink',$fileNameToStore);
           
            $create = new Popup;
            $create->img = $fileNameToStore;
            $create->name = $name;
            $create->url = $url;
            $create->description = $description;
            $create->date_start = $date_start;
            $create->date_end = $date_end;
            $create->status = $status;
            $create->save();
            DB::commit();
            flash()->addSuccess('Your popup has been submitted.');
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
