<?php

namespace App\View\Components;

use Closure;
use App\Models\Kategorie;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class CategorieSlider extends Component
{
    public $title;
    public $dataset;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->dataset = Kategorie::where('kategories.status', 1)
        ->select(DB::raw("kategories.*, (select count(id) FROM products WHERE products.kategori_id = kategories.id AND products.status = 1 ) as count_product"))
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categorie-slider');
    }
}
