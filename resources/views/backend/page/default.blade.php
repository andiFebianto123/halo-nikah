@extends('backend.inc.blank')
@section('content')
@php
	// dd($column);
@endphp
<div class="content">
	<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
		<div>
			<h1>{{ $crud->title }}</h1>
		</div>
		<div>
			<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
				<span><i class="mdi mdi-chevron-right"></i></span>{{ $crud->title }}</p>
		</div>
	</div>
	<div class="mt-2 mb-3">
		<a href="{{ url($crud->url.'/create') }}" class="btn btn-primary"> Add {{ $crud->title }}</a>
	</div>
	@if (isset($filter))
		{!! view($filter) !!}
	@endif
	<div class="row">
		<div class="col-12">
			<div class="card card-default">
				<div class="card-body">
					<div id="crud-control" class="row justify-content-between top-information">
						
					</div>
					<div class="table-responsive">
						<table id="table-datalist" class="table">
							<thead>
								<tr>
									@foreach ($crud->get_all_columns() as $col)
										<th
											style="width: {{ (array_key_exists('width', $col)) ? $col['width'].'px' : '145px' }} !important;"
											data-orderable="{{ var_export($col['orderable'], true) }}"
										>
											{!! $col['label'] !!}
										</th>
									@endforeach
									<th
										style="width:200px !important;"
										data-orderable = "false"
									>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div id="crud-pagination-control" class="row justify-content-between bottom-information">

					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End Content -->
@endsection

@push('styles')
	<!-- No Extra plugin used -->
	<link href="{{ URL::asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
	<link href="{{ URL::asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
	<style>
		#table-datalist{
			table-layout: fixed !important;
			word-wrap:break-word;
		}
		/* #table-datalist tr td:last-child {
			position: sticky;
			left:-200px;
		}
		#table-datalist th:last-child {
			position: sticky;
			left:-200px;
		} */
		#table-datalist th:last-child {
			position: sticky;
			right: 0px;
			background-color: #fff;
			/* box-shadow: -14px 10px 34px -14px rgba(13,12,13,0.56); */
		}
		#table-datalist tr td:last-child {
			position: sticky;
			right: 0px;
			background-color: #fff;
			box-shadow: -14px 10px 34px -14px rgba(13,12,13,0.3);
		}


	</style>
@endpush

@push('scripts')
	<!-- Datatables -->
	<script src="{{ URL::asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>

	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>
	<!-- Option Switcher -->
	{{-- <script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script> --}}

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script>
	<script>
		/*======== RESPONSIVE DATA TABLE ========*/
		window.columns = <?php echo json_encode($crud->get_all_columns()); ?>

		function get_column_render(){
			var columns_ = [];
			for(var i = 0; i<window.columns.length; i++){
				columns_.push({
					data: columns[i].name,
					name: columns[i].name,
					orderlable:columns[i].orderlable,
				});
			}
			columns_.push({
				data:'action',
				name: 'action',
				orderlable: false,
			})
			return columns_;
		}

		if(typeof(window.crud) === 'undefined'){
			window.crud = {};
			window.crud.table = $("#table-datalist").DataTable({
				"paging": true,
				"lengthMenu": [[10, 30, 50, 75, -1], [10, 30, 50, 75, "All"]],
				"pageLength": 10,
				"dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
				processing: true,
				serverSide: true,
				"autoWidth": false,
				// responsive: true,
				ajax: {
					"url": "{!! url($crud->url.'/search') !!}",
					"type": "POST",
					'headers': {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					}
				},
				columns: get_column_render(),
				order: [[0, 'desc']],
			});

			$('#table-datalist_length').appendTo($('#crud-control'));
			$('#table-datalist_filter').appendTo($('#crud-control'));

			// pagination control
			$('#table-datalist_info').appendTo($('#crud-pagination-control'));
			$('#table-datalist_paginate').appendTo($('#crud-pagination-control'));
		}

	
		
	</script>
@endpush