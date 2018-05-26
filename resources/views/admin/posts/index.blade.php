@extends('admin.layouts.main')

@section('title','posts manager')

@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Danh sách bài viết
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<a href="{{ route('admin.posts.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin-top: 12px">
						<span>
							<i class="la la-cart-plus"></i>
							<span>New Post</span>
						</span>
					</a>
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
	<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
		<i class="la la-ellipsis-h m--font-brand"></i>
	</a>
	<div class="m-dropdown__wrapper">
		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
		<div class="m-dropdown__inner">
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav">
						<li class="m-nav__section m-nav__section--first">
							<span class="m-nav__section-text">Quick Actions</span>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-share"></i>
							<span class="m-nav__link-text">Create Post</span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-chat-1"></i>
							<span class="m-nav__link-text">Send Messages</span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-multimedia-2"></i>
							<span class="m-nav__link-text">Upload File</span>
							</a>
						</li>
						<li class="m-nav__section">
							<span class="m-nav__section-text">Useful Links</span>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-info"></i>
							<span class="m-nav__link-text">FAQ</span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-lifebuoy"></i>
							<span class="m-nav__link-text">Support</span>
							</a>
						</li>
						<li class="m-nav__separator m-nav__separator--fit m--hide">
						</li>
						<li class="m-nav__item m--hide">
							<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>				</li>
			</ul>
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
				<th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" data-field="Order ID"><span style="width: 250px;">Title</span></th>
				<th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" data-field="Contact"><span style="width: 80px;">Author</span></th>
				<th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Make"><span style="width: 110px;">Categories</span></th>
				<th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="Car Model"><span style="width: 110px;">Tags</span></th>
				<th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span style="width: 100px;">Create Date</span></th>
				<th title="Field #8" class="m-datatable__cell m-datatable__cell--sort" data-field="Order Date"><span class="text-right" style="width: 80px;">Action</span></th>
			</tr>
			</thead>
			<tbody class="m-datatable__body" style="">
			@foreach($data as $row)
			<tr data-row="0" class="m-datatable__row" style="left: 0px;">
			<td data-field="Order ID" class="m-datatable__cell"><span style="width: 250px; font-weight: 500;"><a class="xanhwp" href="{{ route('admin.posts.edit',$row->id) }}">{{ $row->title }}</a></span></td>
			<td data-field="Owner" class="m-datatable__cell"><span style="width: 80px;">
			@if(isset($row->user->username))
			{{ $row->user->username }}
			@endif
			</span></td><td data-field="Contact" class="m-datatable__cell"><span style="width: 110px;">
				@foreach($row->categories as $item)
					{{ $item->category->name }}, 
				@endforeach
			</span></td>
			<td data-field="Car Make" class="m-datatable__cell"><span style="width: 110px;">
				@foreach($row->tags as $item)
					{{ $item->tag->name }}
				@endforeach
			</span></td>
			<td data-field="Car Model" class="m-datatable__cell"><span style="width: 100px;">{{ $row->created_at }}</span></td>
			<td data-field="Car Model" class="m-datatable__cell" style="width: 80px;">
				<form method="post" action="{{ route('admin.posts.delete',$row->id) }}">
					<div class="row">
						<div class="col-lg-6 text-right" style="padding-right: 1px; padding-left: 5px">
							<a href="{{ route('admin.posts.edit',$row->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp" title="Edit">
							<i class="la la-edit"></i></a>
			            </div>
			            <div class="col-lg-6 text-left" style="padding-left:1px;">
							@method('DELETE')
							@csrf
							<button type="submit" title="Delete" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill xanhwp"><i class="la la-trash"></i></button>
						</div>
					</div>
				</form>
			</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
		{{ $data->links() }}
		<span class="m-datatable__pager-detail">Displaying {{ $data->perPage() }} of {{ $data->total() }} records</span>
		</div></div>
		<!--end: Datatable -->
	</div>
</div>
@endsection