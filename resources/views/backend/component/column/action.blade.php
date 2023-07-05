{{-- <div class="btn-group mb-1">
    <button type="button" class="btn btn-outline-success">Info</button>
    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
        <span class="sr-only">Info</span>
    </button>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Edit</a>
        <a class="dropdown-item" href="#">Delete</a>
    </div>
</div> --}}

@if ($crud->has_permission('update'))
<a href="{{ url($crud->url.'/'.$query->id) }}" class="ml-1">
    <button type="button" class="btn btn-warning btn-sm"> <i class="mdi mdi-pencil-box-outline"></i> Edit</button>
</a>
@endif
@if ($crud->has_permission('delete'))
<a href="javascript:void(0)" data-url="{{ url($crud->url.'/'.$query->id) }}" onclick="deleteEntry(this)" class="ml-1">
    <button type="button" class="btn btn-danger btn-sm"> <i class="mdi mdi-pencil-box-outline"></i> Delete</button>
</a>
@push('scripts') @if (request()->ajax()) @endpush @endif
<script>
	if (typeof deleteEntry != 'function') {
	  $("[data-button-type=delete]").unbind('click');

	  function deleteEntry(button) {
		// ask for confirmation before deleting an item
		// e.preventDefault();
		var route = $(button).attr('data-url');

        Swal.fire({
            title: "{!! trans('custom.warning') !!}",
            text: "{!! trans('custom.delete_confirm') !!}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{!! trans('custom.delete') !!}",
            cancelButtonText: "{!! trans('custom.cancel') !!}"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
			      url: route,
			      type: 'DELETE',
			      success: function(result) {
			          if (result == 1) {
						  // Redraw the table
						  if (typeof window.crud != 'undefined') {
							  // Move to previous page in case of deleting the only item in table
							  if(crud.table.rows().count() === 1) {
							    crud.table.page("previous");
							  }
							  crud.table.draw(false);
						  }
                          flasher.success("{!! trans('custom.delete_confirmation_message') !!}", {timeout: 3000});

			              // Hide the modal, if any
			              $('.modal').modal('hide');
			          } else {
			              console.log('dsdsds');
                          flasher.error("{!! trans('custom.delete_confirmation_message_failed') !!}", {timeout: 3000})         	  
			          }
			      },
			      error: function(result) {
			        // Show an alert with the result
                    flasher.error(result.responseJSON.message, {timeout: 3000})   
			      }
			  });
            }
        });

      }
	}

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
@if (!request()->ajax()) @endpush @endif
@endif

