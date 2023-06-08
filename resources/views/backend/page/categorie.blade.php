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
	<div class="row">
		<div class="col-12">
			<div class="card card-default">
				<div class="card-body">
					<div id="crud-control" class="row justify-content-between top-information">
					</div>
					<div class="table-responsive">
						<table id="table-datalist" class="table"
							style="width:100%">
							<thead>
								<tr>
									@foreach ($crud->get_all_columns() as $col)
										<th
											data-orderable="{{ var_export($col['orderable'], true) }}"
										>
											{!! $col['label'] !!}
										</th>
									@endforeach
									<th
										data-orderable = "false"
									>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
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
				orderlable: false
			})
			return columns_;
		}

		window.crud = $("#table-datalist");
		if (window.crud.length !== 0){
			window.crud = $("#table-datalist").DataTable({
				"paging": true,
				"lengthMenu": [[10, 30, 50, 75, -1], [10, 30, 50, 75, "All"]],
				"pageLength": 10,
				"dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
				processing: true,
				serverSide: true,
				// responsive: true,
				ajax: {
					"url": "{!! url($crud->url.'/search') !!}",
					"type": "POST",
					'headers': {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					}
				},
				columns: get_column_render(),
			});

			$('#table-datalist_length').appendTo($('#crud-control'));
			$('#table-datalist_filter').appendTo($('#crud-control'));
		}
	</script>
@endpush