@php
    // dd($column);
    $item = $query;
@endphp

@if (isset($column['function']))
    {!! $column['function']($item) !!}
@else
    {{ '' }}
@endif