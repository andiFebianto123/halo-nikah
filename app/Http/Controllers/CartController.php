<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;
use Barryvdh\DomPDF\Facade\Pdf;

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

    function print_struck(Request $request){
        $pdf = Pdf::loadView('pdf.struck', [
            'carts' => $request->params, 
        ]);
        Pdf::setOption(['isRemoteEnabled' => true]);
        return $pdf->download('hellonikah_invoice.pdf');
    }
}
