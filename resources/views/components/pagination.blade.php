<?php
    $offset_ = $offset + 1;
?>
<!-- Ec Pagination Start -->
<div class="ec-pro-pagination">
    <span>Showing {{ $draw }} of {{ $total }} item(s)</span>
    <ul class="ec-pro-pagination-inner">
        @if ($page >= 5)
            @php
                $start = $page - 2;
                $end = $page + 2;
                $prev = $page - 3;
                if($prev == 1){
                    $prev = 2;
                }
            @endphp
            @if ($end < $total_page)
                <li><a class="" href="{{ request()->fullUrlWithQuery(['page' => 1]) }}">1</a></li>
                @for ($i = $start, $u = 1; $i <= $end; $i++)
                    @if ($u == 1)
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $prev]) }}">...</a></li>
                    @else
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="{{ ($i == $page) ? 'active' : '' }}">{{ $i }}</a></li>
                    @endif
                    @php $u++; @endphp
                @endfor
            @else
                @php
                    $start = $total_page - 4;
                    if($start == 1){
                        $start = 2;
                    }
                    $end = $total_page;
                    $prev = ($total_page - 5);
                    if($prev == 1){
                        $prev = 2;
                    }
                @endphp
                <li><a class="" href="{{ request()->fullUrlWithQuery(['page' => 1]) }}">1</a></li>
                @for($i = $start, $u = 1; $i <= $end; $i++)
                    @if (($u == 1) && ($total_page > 5))
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $prev]) }}">...</a></li>
                    @else
                        <li><a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="{{ ($i == $page) ? 'active' : '' }}">{{ $i }}</a></li>
                    @endif
                    @php $u++; @endphp
                @endfor
            @endif
        @else
            @if ($total_page > 5)
                @for ($i = 1; $i <= 5; $i++)
                    <li><a class="{{ ($i == $page) ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a></li>
                @endfor
            @else
            @for ($i = 1; $i <= $total_page; $i++)
                <li><a class="{{ ($i == $page) ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a></li>
            @endfor
            @endif
        @endif
        @if ($page < $total_page)
            <li><a class="next" href="{{ request()->fullUrlWithQuery(['page' => ($page + 1)]) }}">Next <i class="ecicon eci-angle-right"></i></a></li>
        @endif
    </ul>
</div>
<!-- Ec Pagination End -->