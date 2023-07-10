<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\ContentController;

class BlogController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Blog');
    }

    function tags($slug){
        $request = request();
        $blogs = new Blog;
        $blogs = $blogs->whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);
        });
        $page = 1;
        if($request->page){
            $page = $request->page;
        }

        $limit = 9;

        $offset = ($page * $limit) - $limit;

        $pagination = [
            'total' => $blogs->count(),
            'limit' => $limit,
            'page' => $page,
            'offset' => $offset
        ];

        $tag = Tag::where('slug', $slug)->first();

        $blogs = $blogs->offset($offset)->limit($limit)->get();
        $pagination['draw'] = $blogs->count();
        $this->merge_data('pagination', $pagination);
        $this->merge_data('blogs', $blogs);
        $this->merge_data('tag', $tag->name);
        return view('frontend.page.blog-tag', $this->getEntry());
    }

    //
    function index(Request $request){

        $blogs = new Blog;

        $page = 1;
        if($request->page){
            $page = $request->page;
        }

        $limit = 9;

        $offset = ($page * $limit) - $limit;

        $pagination = [
            'total' => $blogs->count(),
            'limit' => $limit,
            'page' => $page,
            'offset' => $offset
        ];

        $blogs = $blogs->offset($offset)->limit($limit)->get();
        $pagination['draw'] = $blogs->count();
        $this->merge_data('pagination', $pagination);
        $this->merge_data('blogs', $blogs);

        return view('frontend.page.blog', $this->getEntry());
    }

    function detail($slug){
        $blog = Blog::where('slug', $slug)->first();

        $next_blog = Blog::where('id', '>', $blog->id)->orderBy('id', 'ASC')->first();
        $prev_blog = Blog::where('id', '<', $blog->id)->orderBy('id', 'DESC')->first();

        $this->merge_data('blog', $blog);
        $this->merge_data('next_blog', $next_blog);
        $this->merge_data('prev_blog', $prev_blog);
        return view('frontend.page.blog-detail', $this->getEntry());
    }


}
