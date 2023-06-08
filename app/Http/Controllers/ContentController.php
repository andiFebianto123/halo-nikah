<?php

namespace App\Http\Controllers;

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
        if($this->title){
            $this->datalist['title'] = $this->title;
        }
        return $this->datalist;
    }

}
