<?php

namespace App\View\Components;

use Closure;
use App\Models\SliderBanner as Banner;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SliderBanner extends Component
{
    public $datalist;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct(String $id)
    {
        //
        $this->id = $id;
        $this->datalist = Banner::where('status', 1)
        ->orderBy('order', 'ASC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider-banner');
    }
}
