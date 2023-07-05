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

    function print_struck(Request $request){
        $pdf = Pdf::loadView('pdf.struck', [
            'carts' => $request->params, 
        ]);
        Pdf::setOption(['isRemoteEnabled' => true]);
        return $pdf->download('hellonikah_invoice.pdf');
    }
}
