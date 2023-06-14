<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $total, $limit, $page, $offset, $total_page, $draw;
    /**
     * Create a new component instance.
     */
    public function __construct($total, $limit, $page, $offset, $draw = 0)
    {
        //
        $this->total = $total;
        $this->limit = $limit;
        $this->page = $page;
        $this->offset = $offset;
        $this->draw = $draw;
    }

    function pagination(){
        $page_iteration = ceil($this->total / $this->limit);
        $this->total_page = $page_iteration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->pagination();
        return view('components.pagination');
    }
}
