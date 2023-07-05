<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Kategorie;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;

class TagController extends AdminController
{

    function setup(){
        $this->crud->set_url('tag');
        $this->crud->set_model(Tag::class);
        $this->crud->set_title(mb_ucfirst('tag'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'search' => function($value, $query){
                return $query->where('name', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'slug',
            'label' => 'Slug',
            'type' => 'text',
            'search' => function($value, $query){
                return $query->orWhere('slug', 'LIKE', '%'.$value.'%');
            }
        ]);

        // Add rule validation for create & update
        // $this->crud->set_filter('product');

        $this->crud->deny_access('info');
        // $this->crud->deny_access('update');
        // $this->crud->deny_access('delete');
    }

    function search(Request $request){
        return parent::search($request);
    }


    function rule($id = null){
        if($id != null){
            return [
                'name' => 'required|unique:tags,name,'.$id,
            ];
        }
        return [
            'name' => 'required|unique:tags,name',
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.tag');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.tag', [
            'item' => $item,
            'id' => $id,
        ]);
    }


    function update($id, $request = []){
        $request = request();
        $name = $request->name;
        $slug = $request->slug;

        $this->get_validator($this->rule($id), $request->all());

        DB::beginTransaction();
        try {

            $tag = Tag::where('id', $id)->first();
            $tag->name = $name;
            $tag->slug = $slug;
            $tag->save();
            
            DB::commit();
            flash()->addSuccess('Your updated for tag has been submitted.');
            return redirect($this->crud->url);
        }catch(\Exception $e){
            DB::rollBack();
            flash()->addError($e->getMessage());
            return redirect()->back()->withInput();
        }

    }

    function store(Request $request){
        $name = $request->name;
        $slug = $request->slug;

        $this->get_validator($this->rule(), $request->all());

        DB::beginTransaction();
        try{
            $tag = new Tag;
            $tag->name = $name;
            $tag->slug = $slug;
            $tag->save();
            DB::commit();
            flash()->addSuccess('Your tag has been submitted.');
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
