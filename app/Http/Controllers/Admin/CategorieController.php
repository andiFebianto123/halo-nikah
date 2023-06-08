<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AdminController;

class CategorieController extends AdminController
{

    function setup(){
        $this->crud->set_url('kategori');
        $this->crud->set_model(Kategorie::class);
        $this->crud->set_title(mb_ucfirst('kategori'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'image',
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
            'type' => 'text',
            'orderable' => false,
            'search' => function($value, $query){
                return $query->orWhere('description', 'LIKE', '%'.$value.'%');
            }
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
            'name' => 'required|unique:kategories,name',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.categorie');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.categorie', [
            'item' => $item,
            'id' => $id,
        ]);
    }

    function update($id, $request = []){
        $req = request();
        $image = $req->image;
        $status = $req->status;
        $req->request->remove('_token');

        $this->get_validator($this->rule($id), $req->all());

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
                $req = $req->all();
                $req['image'] = $fileNameToStore;
            }else{
                $req = $req->all();
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
        $name = $request->name;
        $description = $request->description;
        $image = $request->image;
        $status = $request->status;

        $this->get_validator($this->rule(), $request->all());

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
            }else{
                    $fileNameToStore = 'kategori-default.jpg';
            }
            $kategori = new Kategorie;
            $kategori->image = $fileNameToStore;
            $kategori->name = $name;
            $kategori->description = $description;
            $kategori->status = $status;
            $kategori->save();
            DB::commit();
            flash()->addSuccess('Your kategori has been submitted.');
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

}
