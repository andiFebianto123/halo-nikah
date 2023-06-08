<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public $crud;
    
    function index(){
        $this->crud = app('crud');
        $this->crud->title = mb_ucfirst('dashboard');

        return view('backend.page.dashboard2', [
            'crud' => $this->crud,
        ]);
    }
}
