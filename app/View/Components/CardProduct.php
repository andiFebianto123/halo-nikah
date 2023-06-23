<?php

namespace App\View\Components;

// use App\Models\TopProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{
    public $id, $item, $hide_modal;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $item)
    {
        //
        $this->id = $id;
        $this->item = $item;


        $this->hide_modal = false;
        if($item->kategori->name == 'Paket Lengkap'){
            $this->hide_modal = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
