<?php

namespace App\Http\Controllers;

use App\Models\Kategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;

class HomeController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Home');
    }

    function index(){
        $kategori = Kategorie::where('status', 1)->get();
        $this->merge_data('kategori', $kategori);
        
        return view('frontend.page.home', $this->getEntry());
    }
}
