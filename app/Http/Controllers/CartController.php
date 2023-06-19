<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;

class CartController extends ContentController
{
    function __construct()
    {
        $this->setTitle('Cart');
    }

    //
    function index(){
        return view('frontend.page.cart', $this->getEntry());
    }
}
