<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\SpecialProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SpecialProductSlider extends Component
{
    public $id;
    public $datalist;
    /**
     * Create a new component instance.
     */
    public function __construct(String $id = '1')
    {
        //
        $this->id = $id;
        $date_now = Carbon::now();
        $this->datalist = SpecialProduct::whereHas('product.vendor', function($query){
            $query->where('vendors.status', 1)
            ->where('products.status', 1);
        })->where(function($query) use($date_now){
            $query->where('is_permanently', 1)
            ->orWhere(function($query) use($date_now){
                $query->where('date_start', '<=', $date_now)
                    ->where('date_end', '>=', $date_now);
            });
        })->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.special-product-slider');
    }
}
