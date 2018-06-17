@extends('admin.layouts.main')

@section('title','pages manager')

@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Danh sách pages
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<a href="{{ route('admin.pages.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-top: 12px">
				<span>
					<i class="la la-cart-plus"></i>
					<span>New Page</span>
				</span>
			</a>
		</div>
	</div>
	<div class="m-portlet__body">
		@include('admin.layouts.partials.alert-success')
		<!--begin: Datatable -->
		<div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded"><table class="m-datatable__table" id="html_table" width="100%" style="display: block; min-height: 320px; /*overflow-x: auto;*/">
			<thead class="m-datatable__head">
			<tr class="m-datatable__row" style="left: 0px;">
				<th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" data-field="Order ID"><span style="width: 380px;">Title</span></th>
				<th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" data-field="Contact"><span style="width: 100px;">Author</span></th>
				<!-- <th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Make"><span style="width: 110px;">Categories</span></th>
				<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Model"><span style="width: 110px;">Tags</span></th> -->
				<th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span style="width: 100px;">Create Date</span></th>
				<!-- <th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span class="text-right" style="width: 80px;">Action</span></th> -->
			</tr>
			</thead>
			<tbody class="m-datatable__body" style="">
			@foreach($data as $row)
			<tr data-row="0" class="parent-show m-datatable__row" style="left: 0px;">
			<td data-field="Order ID" class="m-datatable__cell align-top">
			<span style="width: 380px; font-weight: 500;"><a class="xanhwp first-uppercase" href="{{ route('admin.pages.edit',$row['id']) }}">{{ $row['text'].$row['title'] }}</a></span>
			<span style="width: 380px; font-weight: 500;" class="child-hidden">
				<form method="post" action="{{ route('admin.pages.delete',$row['id']) }}" class="formdelete">
					<div class="row">
						<div class="col-lg-1 col-xs-1 text-left" style="padding-right: 1px; padding-left: 5px"></div>
						<div class="col-lg-2 col-xs-3 text-left" style="padding-right: 1px; padding-left: 5px">
							<a href="{{ route('admin.pages.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="Edit">
							<i class="la la-edit"></i></a>
			            </div>
			            <div class="col-lg-2 col-xs-4 text-left" style="padding-left:1px;">
							@method('DELETE')
							@csrf
							<button type="submit" title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp"><i class="la la-trash"></i></button>
						</div>
						<div class="col-lg-7 col-xs-4 text-left" style="padding-right: 1px; padding-left: 5px">
							<a href="{{ route('admin.pages.edit',$row['id']) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="View">
							<i class="la la-caret-right"></i></a>
			            </div>
					</div>
				</form>
			</span>
			</td>
			<td data-field="Owner" class="m-datatable__cell align-top"><span style="width: 100px;">
				@if(isset($row['username']))
					<a class="xanhwp align-top" href="#">{{ $row['username'] }}</a>
				@endif
			</span></td>
			<td data-field="Car Model" class="m-datatable__cell align-top"><span style="width: 100px;">{{ $row['created_at'] }}</span></td>
			</tr>
			@endforeach
			</tbody>
		</table>
		<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
		
		<span class="m-datatable__pager-detail">Displaying records</span>
		</div></div>
		<!--end: Datatable -->
	</div>
</div>
@endsection
@section('footer_custom')
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