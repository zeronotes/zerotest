@extends('admin.layouts.main')

@section('title','Users manager')

@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Danh sách user
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<a href="{{ route('admin.users.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-top: 12px">
				<span>
					<i class="la la-cart-plus"></i>
					<span>New User</span>
				</span>
			</a>
		</div>
	</div>
	<div class="m-portlet__body">
		@if(session('msg_success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session('msg_success') }}
		</div>
		@endif
		<!--begin: Datatable -->
		<div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"><table class="m-datatable__table" id="html_table" width="100%" style="display: block; min-height: 300px; /*overflow-x: auto;*/">
			<thead class="m-datatable__head">
			<tr class="m-datatable__row" style="left: 0px;">
				<th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" data-field="Order ID"><span style="width: 30px;">ID</span></th>
				<th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" data-field="Contact"><span style="width: 80px;">Username</span></th>
				<th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Make"><span style="width: 110px;">Name</span></th>
				<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Model"><span style="width: 150px;">Email</span></th>
				<th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span style="width: 120px;">Create Date</span></th>
				<th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span class="text-right" style="width: 80px;">Action</span></th>
			</tr>
			</thead>
			<tbody class="m-datatable__body" style="">
			@foreach($users as $user)
			<tr data-row="0" class="m-datatable__row" style="left: 0px;">
			<td data-field="Order ID" class="m-datatable__cell"><span style="width: 30px;">{{ $user->id }}</span></td>
			<td data-field="Owner" class="m-datatable__cell"><span style="width: 80px;">{{ $user->username }}</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">{{ $user->name }}</span></td>
			<td data-field="Car Make" class="m-datatable__cell"><span style="width: 150px;">{{ $user->email }}</span></td>
			<td data-field="Car Model" class="m-datatable__cell"><span style="width: 120px;">{{ $user->created_at }}</span></td>
			<td data-field="Car Model" class="m-datatable__cell" style="width: 80px;">
				<form class="formdelete" method="post" action="{{ route('admin.users.delete',$user->id) }}">
					<div class="row">
						<div class="col-lg-6 text-right" style="padding-right: 1px; padding-left: 5px">
							<a href="{{ route('admin.users.edit',$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
							<i class="la la-edit"></i></a>
			            </div>
			            <div class="col-lg-6 text-left" style="padding-left:1px;">
							@method('DELETE')
							@csrf
							<button type="submit" title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash"></i></button>
						</div>
					</div>
				</form>
			</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
		{{ $users->links() }}
		<span class="m-datatable__pager-detail">Displaying 10 of {{ $users->total() }} records</span>
		</div>
		</div>
		<!--end: Datatable -->
	</div>
</div>

@endsection
@section('custom_footer_js')
	<script src="/assets/js/jquery.confirm.min.js"></script>
	<script>
	  $('.formdelete').submit(function(event) {
	    event.preventDefault();
	    var form = $(this)[0];

	    $.confirm({
	      // columnClass: 'col-md-4 col-md-offset-4',
	      // theme: 'white',
	      // title: 'Delete',
	      text: "Are you sure you want to delete?",
	      confirmButton: 'Ok',
	      cancelButton: 'Cancel',
	      confirmButtonClass: 'btn-success',
	      cancelButtonClass: 'btn-danger',
	      confirm: function() {
	        //Submit the form
	        form.submit();
	      },
	      cancel: function() {
	        //Do nothing
	      }
	    });
	  });
	</script>
@endsection