<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardVendor extends Component
{
    public $id, $item;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $item)
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
        return view('components.card-vendor');
    }
}
