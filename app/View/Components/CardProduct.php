<?php

namespace App\View\Components;

use App\Models\TopProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{
    public $id, $item;
    /**
     * Create a new component instance.
     */
    public function __construct($id, TopProduct $item)
    {
        //
        $this->id = $id;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
