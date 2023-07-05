<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Kategorie;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogTag;

class BlogController extends AdminController
{

    function setup(){
        $this->crud->set_url('blog');
        $this->crud->set_model(Blog::class);
        $this->crud->set_title(mb_ucfirst('blog'));

        $this->crud->add_column([
            'name' => 'id',
            'label' => 'ID',
            'type' => 'id',
            'orderable' => true,
            'width' => 70,
        ]);

        $this->crud->add_column([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'function',
            'function' => function($item){
                $img_1 = $item->image;

                if($img_1){
                    return '<img 
                        class="tbl-thumb" 
                        src="'.url('storage/images/permalink/'.$img_1).'" 
                        width="20" height="40" alt="Product Image">';
                }

                return '<img 
                    class="tbl-thumb" 
                    src="'.url('storage/images/product/product-default.jpg').'" 
                    width="20" height="40" alt="Product Image">';
            }
        ]);

        $this->crud->add_column([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'orderable' => true,
            'search' => function($value, $query){
                return $query->where('title', 'LIKE', '%'.$value.'%');
            },
            'orderLogic' => function($query, $column, $direction){
                return $query->orderBy('title', $direction);
            },
        ]);

        $this->crud->add_column([
            'name' => 'slug',
            'label' => 'Slug',
            'type' => 'text',
            'search' => function($value, $query){
                return $query->orWhere('slug', 'LIKE', '%'.$value.'%');
            }
        ]);

        $this->crud->add_column([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'function',
            'orderable' => false,
            'function' => function($item){
                return '<span>'.htmlspecialchars(Str::limit($item->content, 100, '...')).'</span>';
            },
            'width' => 200,
        ]);

        $this->crud->add_column([
            'name' => 'user_id',
            'label' => 'Author',
            'type' => 'function',
            'function' => function($item){
                return $item->user->name;
            },
        ]);

        $this->crud->add_column([
            'name' => 'date',
            'label' => 'Tanggal',
            'type' => 'text',
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
                'title' => 'required',
                'slug' => 'required|unique:blogs,slug,'.$id,
                'content' => 'required',
                'tag_id' => 'required|array|min:1',
                'tag_id.*' => 'required|distinct'
            ];
        }
        return [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:5000',
            'tag_id' => 'required|array|min:1',
            'tag_id.*' => 'required|distinct'
        ];
    }

    function index(){
        return $this->admin_view('page.default');
    }

    function create(){
        return $this->admin_view('create.blog');
    }

    function edit($id){
        $item = $this->crud->get_item($id);
        return $this->admin_view('edit.blog', [
            'item' => $item,
            'id' => $id,
        ]);
    }


    function update($id, $request = []){
        $request = request();
        
        $image = $request->image;
        $title = $request->title;
        $slug = $request->slug;
        $content = $request->content;
        $tags = $request->tag_id;


        $this->get_validator($this->rule($id), $request->all());

        DB::beginTransaction();
        try {
            
            $blog = Blog::where('id', $id)->first();
            if($image != null){
                $filenameWithExt = $image->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/images/permalink',$fileNameToStore1);
                $req_data['product_image_1'] = $fileNameToStore1;
                $blog->image = $fileNameToStore1;
            }
            $blog->title = $title;
            $blog->slug = $slug;
            $blog->content = $content;
            $blog->user_id = Auth::guard()->user()->id;
            $blog->date = Carbon::now();
            $blog->save();

            if($blog->id){
                $blogTag = BlogTag::where('blog_id', $blog->id)->get();
                foreach($blogTag as $tag){
                    $tag->delete();
                }
                foreach($tags as $tag){
                    $blogTag = new BlogTag;
                    $blogTag->blog_id = $blog->id;
                    $blogTag->tag_id = $tag;
                    $blogTag->save();
                }
            }

            DB::commit();
            flash()->addSuccess('Your updated for blog has been submitted.');
            return redirect($this->crud->url);
        }catch(\Exception $e){
            DB::rollBack();
            flash()->addError($e->getMessage());
            return redirect()->back()->withInput();
        }

    }

    function store(Request $request){

        $image = $request->image;
        $title = $request->title;
        $slug = $request->slug;
        $content = $request->content;
        $tags = $request->tag_id;

        $this->get_validator($this->rule(), $request->all());

        DB::beginTransaction();
        try{

            if($image != null){
                $filenameWithExt = $image->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/images/permalink',$fileNameToStore1);
                $req_data['product_image_1'] = $fileNameToStore1;
            }

            $blog = new Blog;
            $blog->image = $fileNameToStore1;
            $blog->title = $title;
            $blog->slug = $slug;
            $blog->content = $content;
            $blog->user_id = Auth::guard()->user()->id;
            $blog->date = Carbon::now();
            $blog->save();

            if($blog->id){
                $blogTag = BlogTag::where('blog_id', $blog->id)->get();
                if($blogTag->count() > 0){
                    $blogTag->delete();
                }
                foreach($tags as $tag){
                    $blogTag = new BlogTag;
                    $blogTag->blog_id = $blog->id;
                    $blogTag->tag_id = $tag;
                    $blogTag->save();
                }
            }

            DB::commit();
            flash()->addSuccess('Your blog has been submitted.');
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
            $blogTag = BlogTag::where('blog_id', $id)->delete();
            $delete = parent::destroy($id);
            DB::commit();
            return $delete;
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'result' => true,
            ], 404);
        }
    }

}
