<?php

namespace App\View\Components;

use App\Models\Kategorie;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCategorieSlider extends Component
{
    public $id;
    public $kategori = null;
    public $products = null;
    /**
     * Create a new component instance.
     */
    public function __construct($id)
    {
        $this->id = ($id != null) ? $id : null;
        if($this->id != null){
            $this->kategori = Kategorie::where('id', $id)->first();
            $this->products = Product::whereHas('vendor', function($q){
                $q->where('status', 1);
            })->where(function($query) use($id){
                $query->where('kategori_id', $id)
                ->where('status', 1);
            })->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-categorie-slider');
    }
}
