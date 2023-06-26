<?php

namespace App\Http\Controllers;
use App\Models\Kategorie;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public $title = null;
    public $datalist = [];

    function setTitle($title){
        $this->title = $title.' - Hallo Nikah';
    }

    function merge_data($name, $value){
        $this->datalist[$name] = $value;
    }

    function getEntry(){
        $kategori = Kategorie::where('status', 1)->get();
        $this->datalist['kategori_list'] = $kategori;
        if($this->title){
            $this->datalist['title'] = $this->title;
        }
        return $this->datalist;
    }

}
